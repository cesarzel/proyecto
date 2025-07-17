FROM php:8.2-apache

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev libonig-dev libxml2-dev libpng-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip gd

# Habilita mod_rewrite
RUN a2enmod rewrite

# Copia Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece directorio de trabajo
WORKDIR /var/www/html

# Copia archivos necesarios para Composer primero
COPY composer.json composer.lock ./

# Instala dependencias de producción
RUN composer install --no-dev --optimize-autoloader

# Copia el resto del proyecto
COPY . .

# Define public/ como el DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Permisos adecuados
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]
