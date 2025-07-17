# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala extensiones necesarias
RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Habilita mod_rewrite para Laravel
RUN a2enmod rewrite

# Copia Composer desde imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia archivos de Composer antes para aprovechar cache
COPY composer.json composer.lock ./

# Fuerza plataforma PHP 8.2 (opcional pero útil)
RUN composer config platform.php 8.2.0

# Instala dependencias sin scripts (para evitar errores de artisan en entorno build)
RUN composer install --no-dev --no-scripts --optimize-autoloader --ignore-platform-reqs

# Luego copia el resto del proyecto
COPY . .

# Ejecuta scripts artisan de forma manual (ya en entorno listo)
RUN php artisan config:clear \
 && php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache \
 && php artisan package:discover

# Permisos necesarios para Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Configura el document root de Apache para que apunte a /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Expone el puerto 80 (requerido por Render)
EXPOSE 80

# Comando final
CMD ["apache2-foreground"]
