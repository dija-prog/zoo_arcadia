FROM php:8.2-apache

# Installe les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Active le module mod_rewrite d’Apache (utile pour .htaccess)
RUN a2enmod rewrite

# Change le dossier public de Apache
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Copie tous les fichiers dans l’image Docker
COPY . /var/www/html/

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Donne les bons droits
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
