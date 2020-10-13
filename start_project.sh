#!/usr/bin/env bash

php -r "file_exists('.env') || copy('.env.example', '.env');"
composer install
php artisan key:generate 
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve
