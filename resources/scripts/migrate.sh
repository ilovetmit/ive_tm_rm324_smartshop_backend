#!/bin/bash

cd /home/one92/project_pool/ive_tm_fyp_smart_shop

composer dumpautoload

php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear

php artisan migrate:refresh --seed --force
php artisan passport:install
