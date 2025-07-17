FROM php:8.1-apache

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev libpq-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia el proyecto
COPY . /var/www/html/

WORKDIR /var/www/html

# Instala dependencias Laravel
RUN composer install --no-dev --optimize-autoloader || true

# Permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]
