#!/bin/bash
cd /var/www/html && composer install

php artisan key:generate

php artisan migrate

php artisan db:seed

