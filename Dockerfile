# Utiliser une image PHP avec FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Installer les dépendances requises pour PHP et les extensions pour Symfony et MySQL
RUN apt-get update && apt-get install -y \
    nginx \
    libzip-dev \
    zip \
    unzip \
    git \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    default-mysql-client \
    && docker-php-ext-install \
    pdo_mysql \
    mysqli \
    gd \
    mbstring \
    zip \
    intl \
    bcmath \
    soap \
    exif

# Configurer Nginx
COPY config/nginx/nginx.conf /etc/nginx/nginx.conf

# Nettoyer le cache d'APT
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier l'application Symfony dans le conteneur
COPY . /var/www/html

# Changer les permissions des répertoires
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exposer les ports pour Nginx et PHP-FPM
EXPOSE 80 9000

# Démarrer Nginx et PHP-FPM
CMD service nginx start && php-fpm
