pipeline {
    agent any

    environment {
        GIT_REPO = 'https://github.com/makresh-dev/cgkalarkorba-main_b.git' // Replace with your repo URL
        GIT_BRANCH = 'main'
        GIT_CREDENTIALS = 'github-token' // Jenkins credentials ID for GitHub token
    }

    stages {

        stage('Test: Checkout Repository') {
            steps {
                echo "🔍 Testing GitHub connection..."
                echo "Cloning repository: ${GIT_REPO}"
                git branch: "${GIT_BRANCH}", credentialsId: "${GIT_CREDENTIALS}", url: "${GIT_REPO}"
                echo "✅ Repository cloned successfully!"
            }
        }

        stage('Verify Files') {
            steps {
                echo "📂 Listing project files..."
                sh 'ls -la'
            }
        }

        stage('Git Info') {
            steps {
                echo "📄 Displaying latest commit info..."
                sh '''
                git log -1 --pretty=format:"%h - %an, %ar : %s"
                '''
            }
        }
    }

    post {
        success {
            echo "✅ GitHub connection test successful!"
        }
        failure {
            echo "❌ GitHub connection test failed! Check credentials or network."
        }
    }
}
