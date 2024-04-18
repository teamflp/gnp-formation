# Choisir l'image de base
FROM php:8.3.2-apache

# Mettre à jour les paquets et installer les dépendances requises
RUN apt-get update && apt-get install -y \
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
    exif \
    && a2enmod rewrite

# Activer le mode de réécriture d'Apache
RUN a2enmod rewrite

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier l'application Symfony dans le conteneur
COPY . /var/www/html

# Changer les permissions des répertoires
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exposer le port 80
EXPOSE 80

# Commande pour démarrer le serveur Apache en mode foreground
CMD ["apache2-foreground"]
