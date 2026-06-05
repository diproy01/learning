Initial Setup
composer install
cp .env.example .env
php artisan key:generate

# Configure database credentials in .env

php artisan migrate --seed
npm install
npm run build

Default administrator account:

Email: sysadmin@example.com

Password: System@123