# Utilise la dernière version d'Alpine
FROM alpine:latest

# Installer PHP 8.1 et les paquets nécessaires
RUN apk add --no-cache \
    php81 \
    php81-session \
    php81-mbstring \
    php81-mysqli \
    php81-json \
    php81-openssl \
    php81-zlib \
    php81-curl \
    php81-dom \
    php81-pdo \
    php81-pdo_mysql \
    php81-simplexml \
    php81-tokenizer \
    php81-xmlwriter \
    php81-xml \
    php81-fileinfo \
    php81-iconv \
    php81-xmlreader \
    php81-phar \
    php81-intl \
    php81-ctype \
    php81-opcache \
    php81-gd \
    php81-bcmath \
    php81-exif \
    php81-pcntl \
    php81-posix \
    php81-sockets \
    php81-sysvshm \
    php81-sysvmsg \
    php81-sysvsem \
    php81-shmop \
    php81-zip \
    php81-pgsql \
    php81-pdo_pgsql \
    curl

# Créer un lien symbolique pour php81
RUN ln -sf /usr/bin/php81 /usr/bin/php

# Télécharger Adminer
RUN mkdir -p /var/www \
    && curl -L https://www.adminer.org/static/download/4.8.1/adminer-4.8.1.php -o /var/www/adminer.php

# Exposer le port
EXPOSE 8040

# Commande pour exécuter le conteneur
CMD ["php", "-S", "0.0.0.0:8040", "/var/www/adminer.php"]
