# Etapa 1: Dependencias PHP
FROM composer:2.6 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Etapa 2: Imagen final PHP-FPM
FROM php:8.2-fpm

# Instalar extensiones necesarias + Nginx y Supervisor
RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get install -y nginx supervisor

WORKDIR /var/www/html

# Copiar dependencias de Composer
COPY --from=vendor /app/vendor ./vendor

# Copiar código de Laravel
COPY . .

# 🔹 Ajustar permisos
RUN mkdir -p bootstrap/cache storage \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Copiar configuraciones
COPY ./docker/nginx.conf /etc/nginx/sites-available/default
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copiar entrypoint
COPY ./docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80

# Ejecutar entrypoint al iniciar el contenedor
CMD ["/entrypoint.sh"]
