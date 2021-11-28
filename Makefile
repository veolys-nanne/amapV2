APP_CONTAINER = www_docker_symfony

install:
	docker-compose build
	docker-compose up -d
	docker exec $(APP_CONTAINER) sh -c "composer install"
	docker exec $(APP_CONTAINER) sh -c "chown -R 1000:1000 /var/www/var"
	docker exec $(APP_CONTAINER) sh -c "php bin/console doctrine:database:create"
	docker exec $(APP_CONTAINER) sh -c "php bin/console doctrine:migrations:migrate"