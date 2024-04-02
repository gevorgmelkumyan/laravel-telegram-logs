#!/bin/sh

composer install --prefer-dist --no-progress --no-interaction

chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

service supervisor start

exec docker-php-entrypoint apache2-foreground
