pipeline {
  agent any
  stages {
	stage('Run Unit Tests') {
		steps {
			bat './vendor/bin/phpunit tests --testdox'
		}
	}
	}
}