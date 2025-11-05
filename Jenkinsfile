pipeline {
    agent any

    triggers {
        // 🔁 Automatically check GitHub for changes every 2 minutes
        // (You can replace this with a webhook for instant triggers)
        pollSCM('H/2 * * * *')
    }

    environment {
        GIT_REPO = 'https://github.com/makresh-dev/cgkalarkorba-main_b.git'
        GIT_BRANCH = 'main'
        GIT_CREDENTIALS = 'github-token'   // Jenkins GitHub token ID
        SSH_CREDENTIALS = 'deploy-key'     // Jenkins EC2 SSH key ID
        DEPLOY_USER = 'ubuntu'             // EC2 username
        DEPLOY_SERVER = '52.45.58.115'     // EC2 public IP
        APP_DIR = '/var/www/cgkalarkorba-main_b'  // Laravel app path on EC2
    }

    stages {

        // ============================================================
        stage('Checkout Code from GitHub') {
            steps {
                echo "🔍 Fetching latest code from GitHub..."
                git branch: "${GIT_BRANCH}", credentialsId: "${GIT_CREDENTIALS}", url: "${GIT_REPO}"
            }
        }

        // ============================================================
        stage('Deploy to EC2') {
            steps {
                echo "🚀 Deploying code to EC2 instance..."
                sshagent(credentials: ["${SSH_CREDENTIALS}"]) {
                    sh """
                    ssh -o StrictHostKeyChecking=no ${DEPLOY_USER}@${DEPLOY_SERVER} <<EOF
                        echo "📦 Starting deployment at $(date)"

                        # Create app directory if not exists
                        sudo mkdir -p ${APP_DIR}
                        sudo chown -R ${DEPLOY_USER}:www-data ${APP_DIR}

                        cd ${APP_DIR}

                        echo "🔁 Pulling latest code..."
                        if [ ! -d ".git" ]; then
                            git clone ${GIT_REPO} .
                        else
                            git fetch --all
                            git reset --hard origin/${GIT_BRANCH}
                        fi

                        echo "📦 Installing Composer dependencies..."
                        composer install --no-dev --optimize-autoloader

                        echo "⚙️ Running Laravel optimizations..."
                        php artisan migrate --force
                        php artisan config:clear
                        php artisan config:cache
                        php artisan route:cache
                        php artisan view:clear

                        echo "🔄 Reloading Nginx..."
                        sudo systemctl daemon-reload
                        sudo systemctl reload nginx

                        echo "✅ Deployment completed successfully!"
                    EOF
                    """
                }
            }
        }
    }

    post {
        success {
            echo "✅ Deployment successful — EC2 instance is now updated with latest code!"
        }
        failure {
            echo "❌ Deployment failed. Please check Jenkins logs for details."
        }
    }
}
