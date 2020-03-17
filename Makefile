.PHONY: default install start test stop

.DEFAULT_GOAL := help
SYMFONY_VERSION=5.*


help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

install: ## Install project's dependencies
	@echo "Install project deps"
	docker-compose build

start: ## Start project
	@echo "Start the project"
	docker-compose up --build

db-create: ## Create the database
	@echo "Create the database"
	docker-compose run -e DATABASE_URL="pgsql://postgres:password@db:5432/symfony?serverVersion=12&charset=utf8" --rm symfony php bin/console doctrine:database:create

db-migrations: ## Apply migrations
	@echo "Apply migrations"
	docker-compose run -e DATABASE_URL="pgsql://postgres:password@db:5432/symfony?serverVersion=12&charset=utf8" --rm symfony php bin/console doctrine:migrations:migrate

stop: ## Stop all containers
	@echo "Stop all containers"
	docker-compose down

test: ## Launch the project's tests
	@echo "Launch the tests"
