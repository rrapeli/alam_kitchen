#!/bin/bash
set -e

cd /var/www/html

# Pastikan .env ada
if [ ! -f .env ]; then
  echo ".env belum ada, copy dari example"
  cp .env.example .env
fi

echo "Setting database config dari environment..."

sed -i "s/^DB_CONNECTION=.*/DB_CONNECTION=${DB_CONNECTION}/" .env
sed -i "s/^DB_HOST=.*/DB_HOST=${DB_HOST}/" .env
sed -i "s/^DB_PORT=.*/DB_PORT=3306/" .env
sed -i "s/^DB_DATABASE=.*/DB_DATABASE=${DB_DATABASE}/" .env
sed -i "s/^DB_USERNAME=.*/DB_USERNAME=${DB_USERNAME}/" .env
sed -i "s/^DB_PASSWORD=.*/DB_PASSWORD=${DB_PASSWORD}/" .env

# Permission
echo "Set permission Laravel..."
mkdir -p storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Detect environment
APP_ENV=$(grep ^APP_ENV= .env | cut -d '=' -f2 | tr -d '\r')
APP_ENV=${APP_ENV:-local}

echo "Environment: $APP_ENV"

# Install dependency
if [ "$APP_ENV" = "production" ]; then
    composer install --optimize-autoloader --no-dev
else
    composer install
fi

# Generate key kalau belum ada
php artisan key:generate || true

# Tunggu DB
echo "Menunggu database..."
sleep 5

php artisan migrate || true

# Cache / clear
if [ "$APP_ENV" = "production" ]; then
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
else
    php artisan config:clear
    php artisan cache:clear
    php artisan view:clear
    php artisan route:clear
fi

exec apache2-foreground
