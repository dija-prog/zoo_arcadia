FROM php:8.2-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    libssl-dev \
    pkg-config \
    git \
    && docker-php-ext-install zip

RUN pecl install mongodb && docker-php-ext-enable mongodb

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html/

# ✅ Installe les dépendances PHP via Composer
RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
