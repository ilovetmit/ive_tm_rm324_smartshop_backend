#!/bin/bash
cd /home/one92/project_pool/ive_tm_fyp_smart_shop
git reset --hard HEAD
git clean -f -d
git pull

composer dumpautoload

php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear
