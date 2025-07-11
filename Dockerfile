FROM php:8.2-fpm

# Installer dépendances + nginx + supervisord
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git nginx default-mysql-client supervisor \
    libonig-dev libssl-dev libcurl4-openssl-dev pkg-config libicu-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip intl xml opcache \
    && pecl install mongodb-1.20.0 \
    && docker-php-ext-enable mongodb \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copier l'app
WORKDIR /var/www/html
COPY . /var/www/html

# Droits www-data
RUN chown -R www-data:www-data /var/www/html

# Installer composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer dépendances composer
RUN composer install --no-dev --optimize-autoloader

# Copier config nginx et supervisord
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Exposer port HTTP
EXPOSE 80

# Lancer supervisord
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
