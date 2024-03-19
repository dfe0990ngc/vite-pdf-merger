chmod -R 777 storage/
mkdir storage/app

php artisan config:cache
php artisan optimize:clear