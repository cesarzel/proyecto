FROM php:8.2-apache

# Instala extensiones necesarias
RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Habilita mod_rewrite
RUN a2enmod rewrite

# Copia Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configura y copia archivos base
WORKDIR /var/www/html
COPY composer.json composer.lock ./

# Define la plataforma a PHP 8.2 (como requiere Laravel 12)
RUN composer config platform.php 8.2.0

# Instala dependencias sin dev ni scripts
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Copia el resto del proyecto
COPY . .

# Permisos
RUN chown -R www-data:www-data storage bootstrap/cache

# Configuración Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

EXPOSE 80
CMD ["apache2-foreground"]
