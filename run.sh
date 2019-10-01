#!/bin/sh

set -e

prod=${ENV:-production}
opCacheEnable=${OPCACHE_ENABLE:-1}

if [ "$opCacheEnable" -ne 1 ]; then
  rm -rf /usr/local/etc/php/conf.d/opcache.ini
fi

chown -R www-data:www-data /var/www/html/storage .env
chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache .env

cd /var/www/html

php artisan migrate --force

if [ "$prod" = "production" ]; then
  php artisan config:cache
  php artisan route:cache
fi

# Main app
exec php-fpm
