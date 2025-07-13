FROM php:8.2-fpm

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    curl \
    unzip \
    git \
    libssl-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libmongoc-dev \
    libbson-dev \
    libpng-dev \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-enable mongodb

RUN curl -Lo /var/www/html/adminer.php https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1-mysql.php

# Créer le dossier app
RUN mkdir -p /var/www/html

# Copier les fichiers de l'application
COPY . /var/www/html

# Corriger problème Git safe.directory
RUN git config --global --add safe.directory /var/www/html

# Installer les dépendances PHP avec Composer
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader || true

# Copier la config NGINX et Supervisor
COPY nginx.conf /etc/nginx/nginx.conf
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80

CMD ["/usr/bin/supervisord"]
