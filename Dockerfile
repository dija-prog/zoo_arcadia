# Utiliser une image officielle PHP avec Apache
FROM php:8.2-apache

# Installer les extensions PHP nécessaires (ex: pdo, pdo_mysql, mongodb)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copier les fichiers composer.json et composer.lock avant le reste (pour cache Docker)
WORKDIR /var/www/html
COPY composer.json composer.lock ./

# Installer les dépendances PHP via Composer
RUN composer install --no-dev --optimize-autoloader

# Copier le reste des fichiers de l’application
COPY . .

# Donner les bonnes permissions (si besoin)
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80
EXPOSE 80

# Commande par défaut (Apache en mode foreground)
CMD ["apache2-foreground"]
