APP_CONTAINER = www_docker_symfony

install: .check-tag .confirm
    docker-compose build
    docker-compose up -d
    docker exec $(APP_CONTAINER) sh -c "composer install"
    docker exec $(APP_CONTAINER) sh -c "chown -R 1000:1000 /srv/var"
    docker exec $(APP_CONTAINER) sh -c "php bin/console doctrine:migrations:migrate"