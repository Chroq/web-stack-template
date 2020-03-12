.PHONY: default install start test stop

.DEFAULT_GOAL := help
SYMFONY_VERSION=5.*


help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

install: ## Install project's dependencies
	@echo "Install project deps"
	SYMFONY_VERSION=${SYMFONY_VERSION} docker-compose build

start: ## Start project
	@echo "Start the project"
	SYMFONY_VERSION=${SYMFONY_VERSION} docker-compose up --build

stop: ## Stop all containers
	@echo "Stop all containers"
	docker-compose down

test: ## Launch the project's tests
	@echo "Launch the tests"
