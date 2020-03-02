# IVE_TM_FYP_Smart_Shop
IVE_TM_FYP_Smart_Shop_1920

# Laravel PHP Framework
Laravel 6.0
AdminLTE v3

# Setup:
All you need is to run these commands:
```bash
composer install
cp .env.server .env
php artisan key:generate
npm install
npm run dev
php artisan storage:link
sudo chmod 777 storage/app/public/ 
php artisan migrate:refresh --seed
php artisan passport:install
php artisan serve
```
