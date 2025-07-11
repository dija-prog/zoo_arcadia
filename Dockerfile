# Utilise une image officielle PHP avec Apache
FROM php:8.2-apache

# Active les extensions nécessaires (ex : MongoDB si tu l’utilises)
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install intl pdo pdo_mysql

# Active l'extension MongoDB si nécessaire
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Copie tous les fichiers du projet dans le dossier Apache
COPY . /var/www/html/

# Active Apache rewrite
RUN a2enmod rewrite

# Expose le port 80
EXPOSE 80
