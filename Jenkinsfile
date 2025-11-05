pipeline {
    agent any

    environment {
        DEPLOY_USER = 'ubuntu'
        DEPLOY_HOST = '52.45.58.115'
        DEPLOY_PATH = '/var/www/cgkalarkorba-main_a'
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
