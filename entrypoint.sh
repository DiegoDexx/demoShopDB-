#!/bin/sh
set -e

# Ejecutar migraciones
php artisan migrate --force

# 🔹 Opcional: correr seeders si quieres datos iniciales
php artisan db:seed --force
# Luego arrancar supervisord
exec /usr/bin/supervisord -n -c /etc/supervisor/conf.d/supervisord.conf
