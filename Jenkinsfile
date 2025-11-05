pipeline {
    agent any

    triggers {
        // 🔁 Trigger Jenkins build whenever code changes in GitHub
        pollSCM('H/2 * * * *')  // every 2 minutes — or use webhook (preferred)
    }

    environment {
        GIT_REPO = 'https://github.com/makresh-dev/cgkalarkorba-main_b.git'
        GIT_BRANCH = 'main'
        GIT_CREDENTIALS = 'github-token'     // GitHub token credential ID in Jenkins
        SSH_CREDENTIALS = 'deploy-key'       // EC2 SSH key credential ID in Jenkins
        DEPLOY_USER = 'ubuntu'               // EC2 username
        DEPLOY_SERVER = '52.45.58.115'       // EC2 public IP
        APP_DIR = '/var/www/cgkalarkorba-main_b' // Laravel project root on EC2
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
                    sh '''
                    ssh -o StrictHostKeyChecking=no ${DEPLOY_USER}@${DEPLOY_SERVER} << 'EOF'
                        echo "📂 Navigating to ${APP_DIR}..."
                        # create directory if not exists
                        sudo mkdir -p ${APP_DIR}
                        sudo chown -R ${DEPLOY_USER}:${DEPLOY_USER} ${APP_DIR}

                        cd ${APP_DIR}

                        echo "🔁 Pulling latest changes..."
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
                        php artisan view:clear

                        echo "🔄 Reloading Nginx..."
                        sudo systemctl reload nginx

                        echo "✅ Deployment complete!"
                    EOF
                    '''
                }
            }
        }
    }

    post {
        success {
            echo "✅ Code updated successfully on EC2!"
        }
        failure {
            echo "❌ Deployment failed. Check Jenkins logs."
        }
    }
}
