pipeline {
  agent any

  environment {
    APP_SERVER_IP = "52.45.58.115"
    DEPLOY_PATH   = "/var/www/cgkalarkorba-main_a"
  }

  stages {
    stage('Checkout') {
      steps {
        sshagent (credentials: ['github-repo-key']) {
          git branch: 'main', url: 'git@github.com:<your-org>/<repo>.git'
        }
      }
    }

    stage('Deploy to EC2') {
      steps {
        sshagent (credentials: ['ec2-deploy-key']) {
          sh '''
            echo "Deploying to EC2 server..."
            tar czf app.tar.gz ./*
            scp -o StrictHostKeyChecking=no app.tar.gz ubuntu@${APP_SERVER_IP}:/tmp/
            ssh -o StrictHostKeyChecking=no ubuntu@${APP_SERVER_IP} << 'EOF'
              set -e
              cd /var/www/yourapp
              rm -rf old_release
              mv current old_release || true
              mkdir -p current
              tar xzf /tmp/app.tar.gz -C current
              cd current
              composer install --no-dev --optimize-autoloader
              php artisan migrate --force
              php artisan config:cache
              php artisan route:cache
              php artisan view:cache
              sudo systemctl reload nginx
              echo "✅ Deployed successfully!"
            EOF
          '''
        }
      }
    }
  }
}
