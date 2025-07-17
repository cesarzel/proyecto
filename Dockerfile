FROM php:8.1-apache

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Habilita mod_rewrite para Laravel
RUN a2enmod rewrite

# Copia el código fuente
COPY . /var/www/html/

# CAMBIO CLAVE: Define que el DocumentRoot sea public/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Modifica la config de Apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copia Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Instala dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]
