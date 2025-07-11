FROM php:8.2-fpm

# Installer les dépendances système et extensions PHP nécessaires (MySQL, Zip, MongoDB)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    nginx \
    default-mysql-client \
    libonig-dev \
    libssl-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libicu-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip intl xml opcache

# Installer PECL mongodb version 1.20.0 et l’activer
RUN pecl install mongodb-1.20.0 && docker-php-ext-enable mongodb

# Copier les fichiers de l’application
WORKDIR /var/www/html
COPY . /var/www/html

# Donner les droits à www-data
RUN chown -R www-data:www-data /var/www/html

# Installer composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances PHP via composer
RUN composer install --no-dev --optimize-autoloader

# Copier la config nginx
COPY ./nginx.conf /etc/nginx/nginx.conf

# Exposer le port 80 pour HTTP
EXPOSE 80

# Lancer nginx et php-fpm en foreground
CMD service nginx start && php-fpm -F
