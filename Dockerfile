FROM node:18-alpine AS node-build
WORKDIR /var/www/html
COPY package.json package-lock.json* ./
RUN npm ci && npm cache clean --force
COPY . .
RUN npm run build

FROM php:8.2-fpm-alpine
WORKDIR /var/www/html

RUN apk add --no-cache \
    unzip zip git curl libpng-dev libxml2-dev oniguruma-dev \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

COPY --from=node-build /var/www/html/public/build /var/www/html/public/build

RUN composer install --no-dev --optimize-autoloader --no-interaction \
    && chmod -R 775 storage bootstrap/cache \
    && cp -r public /var/www/html/public-backup

COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 9000

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php-fpm"]
