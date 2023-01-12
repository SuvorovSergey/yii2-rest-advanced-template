.PHONY: up down build cs test analyse
.DEFAULT_GOAL := up
php_container := app_php

# start all services
up:
	docker-compose up -d --remove-orphans
# stop service
down:
	docker-compose down --remove-orphans
# restart with rebuild
build: down
	docker-compose up -d --build
# go into container
t:
	gnome-terminal -- bash -c 'docker exec -it $(php_container) bash'

# php code style fix
cs:
	docker exec $(php_container) vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php -v --using-cache=no
# php code style check
cs.check:
	docker exec $(php_container) vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php -v --using-cache=no --dry-run
# run phpstan
analyse:
	docker exec $(php_container) vendor/bin/phpstan analyse

# apply migrations
migrate:
	docker exec $(php_container) php yii migrate/up
# apply migrations on test db
migrate.test:
	docker exec $(php_container) php yii_test migrate/up --interactive=0

# run tests
test: migrate.test
	docker exec $(php_container) vendor/bin/codecept run