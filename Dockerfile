FROM php:8.2-apache

# Instala extensiones necesarias
RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Habilita mod_rewrite
RUN a2enmod rewrite

# Copia Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia todo el proyecto completo antes del install
WORKDIR /var/www/html
COPY . .

# Ajustes de permisos
RUN chown -R www-data:www-data storage bootstrap/cache

# Instala dependencias de Composer (desactiva scripts)
RUN composer install --no-dev --no-scripts --optimize-autoloader

# Ejecuta scripts post-install manualmente (si no hay error)
RUN composer run-script post-autoload-dump || true

# Apache escucha el puerto asignado por Render
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
 && sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf \
 && sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

EXPOSE ${PORT}
CMD ["apache2-foreground"]
