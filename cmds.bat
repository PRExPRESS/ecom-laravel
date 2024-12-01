@echo off

echo Generating Models, Migrations, Controllers, and Seeders...

php artisan make:model Category -a
php artisan make:model Product -a
php artisan make:model ProductImage -a
php artisan make:model ProductSize -a
php artisan make:model ProductColor -a
php artisan make:model ProductVariant -a
php artisan make:model Order -a
php artisan make:model OrderItem -a

echo All models, migrations, controllers, and seeders have been generated successfully!
pause
