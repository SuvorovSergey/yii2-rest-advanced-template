.PHONY: up down build cs test analyse
.DEFAULT_GOAL := up

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
	gnome-terminal -- bash -c 'docker exec -it app_php bash'