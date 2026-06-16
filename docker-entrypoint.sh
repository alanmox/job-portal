#!/bin/sh
set -e

echo "Waiting for MySQL to be ready..."
max_retries=60
counter=0
until php -r "new PDO('mysql:host=${DB_HOST:-db};port=${DB_PORT:-3306};dbname=${DB_DATABASE:-job_portal}', '${DB_USERNAME:-job_portal_user}', '${DB_PASSWORD:-secret}', [PDO::ATTR_TIMEOUT => 3]);" 2>/dev/null; do
    counter=$((counter + 1))
    if [ $counter -ge $max_retries ]; then
        echo "MySQL did not become ready in time."
        exit 1
    fi
    sleep 2
done
echo "MySQL is ready."

if [ ! -f .env ]; then
    echo "No .env file found. Creating from .env.example..."
    cp .env.example .env
fi

if ! grep -q "^APP_KEY=" .env || [ "$(grep '^APP_KEY=' .env | cut -d= -f2)" = "" ]; then
    echo "Generating APP_KEY..."
    php artisan key:generate --force
fi

echo "Copying public assets to shared volume..."
if [ -d /var/www/html/public-backup ] && [ ! -f /var/www/html/public/index.php ]; then
    cp -r /var/www/html/public-backup/. /var/www/html/public/
fi

echo "Caching config..."
php artisan config:cache

echo "Creating storage link..."
php artisan storage:link --force || true

echo "Running migrations..."
php artisan migrate --force

echo "Running seeders..."
php artisan db:seed --force

echo "Setting permissions..."
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data public/profile_img 2>/dev/null || true
chmod -R 775 public/profile_img 2>/dev/null || true

exec "$@"
