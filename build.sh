#!/bin/bash
# Version corrigée
set -e # Arrête le script en cas d'erreur

# Installer Composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer les dépendances
composer install --no-dev --optimize-autoloader --working-dir=/var/www/html

# Corriger les permissions
chmod -R 755 /var/www/html/vendor
chown -R www-data:www-data /var/www/html/vendor

# Solution alternative pour l'autoload
if [ ! -f "/var/www/html/vendor/autoload.php" ]; then
    ln -s /var/www/html/vendor /var/www/html/public/vendor
fi