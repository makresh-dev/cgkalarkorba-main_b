pipeline {
    agent any

    environment {
        // 🔧 Configuration Variables
        GIT_REPO = 'https://github.com/makresh-dev/cgkalarkorba-main_b.git'
        GIT_BRANCH = 'main'                     // Change if your repo uses a different branch
        GIT_CREDENTIALS = 'github-token'        // Jenkins GitHub token ID
        SSH_CREDENTIALS = 'deploy-key'          // Jenkins EC2 SSH key ID
        DEPLOY_USER = 'ubuntu'                  // EC2 username
        DEPLOY_SERVER = '52.45.58.115'          // EC2 Public IP or domain
    }

    stages {

        // ============================================================
        stage('1️⃣ Test GitHub → Jenkins Connection') {
            steps {
                echo "🔍 Testing GitHub connection..."
                git branch: "${GIT_BRANCH}", credentialsId: "${GIT_CREDENTIALS}", url: "${GIT_REPO}"
                echo "✅ Successfully cloned the repository from GitHub!"
                sh 'ls -la' // show repository contents
            }
        }

        // ============================================================
        stage('2️⃣ Test Jenkins → EC2 SSH Connection') {
            steps {
                echo "🔍 Testing SSH connection to EC2 instance..."
                sshagent(credentials: ["${SSH_CREDENTIALS}"]) {
                    sh '''
                    ssh -o StrictHostKeyChecking=no ${DEPLOY_USER}@${DEPLOY_SERVER} "echo '✅ SSH connection successful from Jenkins to EC2!' && hostname && whoami && uptime"
                    '''
                }
            }
        }

        // ============================================================
        stage('3️⃣ Test Bi-directional Validation') {
            steps {
                echo "🔁 Performing bi-directional validation..."
                sshagent(credentials: ["${SSH_CREDENTIALS}"]) {
                    sh '''
                    ssh -o StrictHostKeyChecking=no ${DEPLOY_USER}@${DEPLOY_SERVER} "ls -la /var/www || echo '⚠️ Path not found'"
                    '''
                }
            }
        }
    }

    post {
        success {
            echo "🎉 All connections (GitHub ↔ Jenkins ↔ EC2) are working successfully!"
        }
        failure {
            echo "❌ Connection test failed — check credentials or network settings."
        }
    }
}
