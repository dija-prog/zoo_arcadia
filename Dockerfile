# 1. Utiliser une image de base avec PHP-FPM
FROM php:8.2-fpm

# 2. Installer nginx et extensions PHP nécessaires (ex: MongoDB)
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    unzip \
    git \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# 3. Copier le code de ton app
COPY . /var/www/html

# 4. Copier ta configuration Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# 5. Créer les logs nginx si nécessaires
RUN mkdir -p /var/log/nginx

# 6. Définir les permissions
RUN chown -R www-data:www-data /var/www/html

# 7. Copier la configuration supervisord
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# 8. Exposer le port 80 (important pour Render)
EXPOSE 80

# 9. Lancer supervisord pour gérer nginx + php-fpm
CMD ["/usr/bin/supervisord"]
