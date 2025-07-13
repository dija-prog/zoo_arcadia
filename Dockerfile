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
# Installer l'extension MongoDB (version 1.20.0 compatible avec composer.lock)
RUN pecl install mongodb-1.20.0 \
    && docker-php-ext-enable mongodb
# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Télécharger Adminer
RUN curl -Lo /var/www/html/adminer.php https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1-mysql.php

# Créer le dossier app
RUN mkdir -p /var/www/html

# Définir le dossier de travail
WORKDIR /var/www/html

# Copier uniquement les fichiers Composer d'abord (pour le cache Docker)
COPY composer.json composer.lock* ./

# Installer les dépendances PHP (AVANT de copier tout le projet)
RUN composer install --no-dev --optimize-autoloader

# Copier le reste des fichiers de l'application
COPY . .

# Corriger problème Git safe.directory
RUN git config --global --add safe.directory /var/www/html

# Copier la config NGINX et Supervisor
COPY nginx.conf /etc/nginx/nginx.conf
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Exposer le port HTTP
EXPOSE 80

# Lancer supervisord
CMD ["/usr/bin/supervisord"]
