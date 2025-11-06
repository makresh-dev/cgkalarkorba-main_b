pipeline {
    agent any

    triggers {
        // 🔁 Poll every 2 minutes (optional; replace with GitHub webhook for real-time builds)
        pollSCM('H/2 * * * *')
    }

    environment {
        GIT_REPO       = 'https://github.com/makresh-dev/cgkalarkorba-main_b.git'
        GIT_BRANCH     = 'main'
        SSH_CREDENTIALS = 'deploy-key'  // Jenkins credential ID for EC2 SSH key
        DEPLOY_USER    = 'ubuntu'
        DEPLOY_SERVER  = '52.45.58.115'
        APP_DIR        = '/var/www/cgkalarkorba-main_b'
        PHP_SERVICE    = 'php7.4-fpm'
    }

    stages {

        stage('Checkout Code from GitHub') {
            steps {
                echo "🔍 Fetching latest code from GitHub..."
                // Checkout repo (no credentials needed if public; otherwise add credentialsId)
                git branch: "${GIT_BRANCH}", url: "${GIT_REPO}"
            }
        }

        stage('Deploy to EC2') {
            steps {
                echo "🚀 Deploying code to EC2 instance..."
                sshagent(credentials: ["${SSH_CREDENTIALS}"]) {
                    // ✅ Use escaped double quotes to safely interpolate Groovy vars
                    sh """
                        ssh -o StrictHostKeyChecking=no "${DEPLOY_USER}@${DEPLOY_SERVER}" '
                            set -euo pipefail
                            echo "📦 Starting deployment at \$(date)"

                            # Create app directory and set ownership
                            sudo mkdir -p ${APP_DIR}
                            sudo chown -R ${DEPLOY_USER}:www-data ${APP_DIR}
                            cd ${APP_DIR}

                            echo "🔁 Pulling latest code..."
                            if [ ! -d .git ]; then
                                git clone ${GIT_REPO} .
                            else
                                git fetch --all
                                git reset --hard origin/${GIT_BRANCH}
                            fi

                            echo "📦 Installing dependencies..."
                            composer install --no-dev --optimize-autoloader

                            echo "🧹 Fixing file ownership and permissions..."
                            sudo chown -R www-data:www-data storage bootstrap/cache
                            sudo chmod -R 775 storage bootstrap/cache

                            echo "⚙️ Running Laravel optimizations..."
                            php artisan migrate --force
                            php artisan config:clear
                            php artisan config:cache
                            php artisan route:cache
                            php artisan view:clear

                            echo "🔄 Restarting PHP-FPM and reloading Nginx..."
                            sudo systemctl restart ${PHP_SERVICE} || true
                            sudo systemctl reload nginx

                            echo "✅ Deployment completed successfully!"
                        '
                    """
                }
            }
        }
    }

    post {
        success {
            echo "✅ Deployment successful — EC2 instance updated with latest code!"
        }
        failure {
            echo "❌ Deployment failed. Check Jenkins logs for details."
        }
    }
}
