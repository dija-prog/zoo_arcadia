# Utilise PHP avec Apache
FROM php:8.2-apache

# Active mod_rewrite (utile pour .htaccess)
RUN a2enmod rewrite

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie tout le code source dans le conteneur
COPY . /var/www/html

# Définit le dossier public comme racine web
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Modifie la config Apache pour pointer vers /public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Change le dossier de travail
WORKDIR /var/www/html

# Installe les dépendances PHP avec Composer
RUN composer install

# Expose le port
EXPOSE 80
