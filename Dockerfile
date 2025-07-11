# Utilise une image PHP officielle avec Apache
FROM php:8.2-apache

# Active mod_rewrite (utile pour les frameworks MVC)
RUN a2enmod rewrite

# Installe les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    libssl-dev \
    pkg-config \
    git \
    && docker-php-ext-install zip

# Installe l'extension MongoDB
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie les fichiers dans le container
COPY . /var/www/html/

# Donne les droits à Apache
RUN chown -R www-data:www-data /var/www/html

# Change le DocumentRoot si ton index.php est dans /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Applique ce nouveau document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Expose le port (Render s'en occupe, mais utile en local)
EXPOSE 80
