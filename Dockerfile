# Dockerfile pour Laravel 12 (PHP 8.2, Composer, Node.js)
FROM php:8.2-fpm

# Installer les dépendances système
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        curl \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        zip \
        unzip \
        npm \
        nodejs \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www

# Copier le reste du code (sera fait après l'init du projet)
# COPY . .

# Droits
RUN chown -R www-data:www-data /var/www

EXPOSE 9000
CMD ["php-fpm"] 