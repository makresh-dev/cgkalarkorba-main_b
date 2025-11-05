pipeline {
    agent any

    triggers {
        pollSCM('H/2 * * * *')
    }

    environment {
        GIT_REPO = 'https://github.com/makresh-dev/cgkalarkorba-main_b.git'
        GIT_BRANCH = 'main'
        GIT_CREDENTIALS = 'github-token'
        SSH_CREDENTIALS = 'deploy-key'
        DEPLOY_USER = 'ubuntu'
        DEPLOY_SERVER = '52.45.58.115'
        APP_DIR = '/var/www/cgkalarkorba-main_b'
    }

    stages {

        stage('Checkout Code from GitHub') {
            steps {
                echo "🔍 Fetching latest code from GitHub..."
                git branch: "${GIT_BRANCH}", credentialsId: "${GIT_CREDENTIALS}", url: "${GIT_REPO}"
            }
        }

        stage('Deploy to EC2') {
            steps {
                echo "🚀 Deploying code to EC2 instance..."
                sshagent(credentials: ["${SSH_CREDENTIALS}"]) {
                    sh '''
                    ssh -o StrictHostKeyChecking=no ${DEPLOY_USER}@${DEPLOY_SERVER} <<EOF
                        echo "📦 Starting deployment at $(date)"

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

                        echo "📦 Installing dependencies..."
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
                    '''
                }
            }
        }
    }

    post {
        success {
            echo "✅ Deployment successful — EC2 instance updated!"
        }
        failure {
            echo "❌ Deployment failed. Check Jenkins logs for details."
        }
    }
}
