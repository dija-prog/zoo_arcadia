# Étape 1 : utiliser une image officielle PHP 8.2 avec FPM
FROM php:8.2-fpm

# Installer les dépendances système nécessaires (ex: pour mongodb, zip, etc.)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install zip

# Installer PECL mongodb et l’activer
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Copier les fichiers de l’application
WORKDIR /var/www/html
COPY . /var/www/html

# Donner les droits à www-data (optionnel selon besoin)
RUN chown -R www-data:www-data /var/www/html

# Installer composer (si tu ne l’as pas dans l’image)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances PHP via composer
RUN composer install --no-dev --optimize-autoloader

# Exposer le port (exemple 9000 pour FPM)
EXPOSE 9000

# Lancer PHP-FPM (par défaut CMD de l’image officielle)
