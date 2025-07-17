FROM php:8.2-apache

# Instala extensiones necesarias
RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Habilita mod_rewrite
RUN a2enmod rewrite

# Copia Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia archivos antes del install
WORKDIR /var/www/html
COPY composer.json composer.lock ./

# Instalación de dependencias (sin post-scripts de artisan)
RUN composer install --no-dev --no-scripts --optimize-autoloader

# Luego copias todo lo demás
COPY . .

# Ejecuta los scripts manualmente
RUN composer run-script post-autoload-dump || true

# Permisos
RUN chown -R www-data:www-data storage bootstrap/cache

# Configuración de Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
RUN sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

EXPOSE ${PORT}
CMD ["apache2-foreground"]
