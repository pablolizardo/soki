echo "clear all and rerun the migrations"
composer dumpautoload
#php artisan cache:clear
#php artisan cache:table
php artisan clear-compiled
php artisan migrate
php artisan db:seed
echo "listo!"