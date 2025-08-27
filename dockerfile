# Etapa 1: dependencias
FROM composer:2.6 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Etapa final
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get install -y nginx supervisor

WORKDIR /var/www/html

# Copiar vendor
COPY --from=vendor /app/vendor ./vendor
COPY . .

# Asegurar cache
RUN mkdir -p bootstrap/cache && chmod -R 775 bootstrap/cache

# Config Nginx
COPY ./docker/nginx.conf /etc/nginx/sites-available/default

# Config Supervisor
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80

CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
