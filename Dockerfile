FROM php:8.1-apache

# Activer mod_rewrite, installer extensions PHP nécessaires (exemple)
RUN a2enmod rewrite && \
    apt-get update && apt-get install -y libzip-dev unzip libssl-dev pkg-config git && \
    docker-php-ext-install zip

# Installer MongoDB extension version compatible avec composer.lock (ici 1.20.0)
RUN pecl install mongodb-1.20.0 && echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/docker-php-ext-mongodb.ini

# Copier le code source dans l'image
COPY . /var/www/html/

# Mettre les droits
RUN chown -R www-data:www-data /var/www/html

# Composer (on suppose composer est dans le PATH ou on peut copier depuis une image officielle)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Installer les dépendances PHP sans dev
RUN composer install --no-dev --optimize-autoloader

EXPOSE 80
CMD ["apache2-foreground"]
