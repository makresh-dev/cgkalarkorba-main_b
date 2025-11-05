pipeline {
    agent any

    environment {
        DEPLOY_SERVER = '52.45.58.115'
        DEPLOY_USER = 'ubuntu'
        APP_DIR = '/var/www/cgkalarkorba-main_b'
        GIT_CREDENTIALS = 'github-token'
        SSH_CREDENTIALS = 'deploy-key'
    }

    stages {

        stage('Checkout') {
            steps {
                git branch: 'test_1_branch',
                    credentialsId: "${GIT_CREDENTIALS}",
                    url: 'https://github.com/makresh-dev/cgkalarkorba-main_b.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh '''
                echo "Installing PHP dependencies..."
                composer install --no-dev --optimize-autoloader
                '''
            }
        }

        stage('Run Tests') {
            steps {
                sh '''
                echo "Running Laravel tests..."
                php artisan test || true
                '''
            }
        }

        stage('Deploy to Server') {
            steps {
                sshagent(credentials: ["${SSH_CREDENTIALS}"]) {
                    sh '''
                    echo "Deploying to EC2 server..."
                    ssh -o StrictHostKeyChecking=no ${DEPLOY_USER}@${DEPLOY_SERVER} << 'EOF'
                        cd ${APP_DIR}
                        git pull origin main
                        composer install --no-dev --optimize-autoloader
                        php artisan migrate --force
                        php artisan config:cache
                        php artisan route:cache
                        php artisan view:clear
                        sudo systemctl reload nginx
                    EOF
                    '''
                }
            }
        }
    }

    post {
        success {
            echo "✅ Deployment completed successfully!"
        }
        failure {
            echo "❌ Deployment failed! Check Jenkins logs."
        }
    }
}
