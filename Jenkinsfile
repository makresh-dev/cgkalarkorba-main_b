pipeline {
    agent any

    environment {
        DEPLOY_USER = '${{ secrets.USERNAME }}'
        DEPLOY_HOST = '${{ secrets.HOST }}'
        DEPLOY_PATH = '${{ secrets.APP_DIR }}'
        SSH_CREDENTIALS = 'ec2-ssh'
    }

    stages {

        stage('Checkout Code') {
            steps {
                git branch: 'main', url: 'https://github.com/makresh-dev/cgkalarkorba-main_b.git'
            }
        }

        stage('Run Tests') {
            steps {
                sh '''
                php artisan --version
                '''
            }
        }

        stage('Deploy to EC2') {
            steps {
                sshagent (credentials: ["${SSH_CREDENTIALS}"]) {
                    sh '''
                    ssh -o StrictHostKeyChecking=no ${DEPLOY_USER}@${DEPLOY_HOST} << 'EOF'
                    cd ${DEPLOY_PATH}
                    git pull origin main
                    composer install --no-dev --optimize-autoloader
                    php artisan migrate --force
                    php artisan cache:clear
                    php artisan config:cache
                    sudo systemctl reload php7.4-fpm
                    sudo systemctl reload nginx
                    EOF
                    '''
                }
            }
        }
    }
}
