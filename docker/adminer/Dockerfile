# Utilise la dernière version d'Alpine
FROM alpine:latest

# Définir des variables d'environnement pour PHP
ENV PHP_VERSION=81

# Installer PHP et les extensions nécessaires
RUN apk add --no-cache \
    php${PHP_VERSION} \
    php${PHP_VERSION}-session \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-mysqli \
    php${PHP_VERSION}-json \
    php${PHP_VERSION}-openssl \
    php${PHP_VERSION}-zlib \
    php${PHP_VERSION}-curl \
    php${PHP_VERSION}-dom \
    php${PHP_VERSION}-pdo \
    php${PHP_VERSION}-pdo_mysql \
    php${PHP_VERSION}-simplexml \
    php${PHP_VERSION}-tokenizer \
    php${PHP_VERSION}-xmlwriter \
    php${PHP_VERSION}-xml \
    php${PHP_VERSION}-fileinfo \
    php${PHP_VERSION}-iconv \
    php${PHP_VERSION}-xmlreader \
    php${PHP_VERSION}-phar \
    php${PHP_VERSION}-intl \
    php${PHP_VERSION}-ctype \
    php${PHP_VERSION}-opcache \
    php${PHP_VERSION}-gd \
    php${PHP_VERSION}-bcmath \
    php${PHP_VERSION}-exif \
    php${PHP_VERSION}-pcntl \
    php${PHP_VERSION}-posix \
    php${PHP_VERSION}-sockets \
    php${PHP_VERSION}-sysvshm \
    php${PHP_VERSION}-sysvmsg \
    php${PHP_VERSION}-sysvsem \
    php${PHP_VERSION}-shmop \
    php${PHP_VERSION}-zip \
    php${PHP_VERSION}-pgsql \
    php${PHP_VERSION}-pdo_pgsql \
    curl \
    && ln -sf /usr/bin/php${PHP_VERSION} /usr/bin/php

# Télécharger la dernière version d'Adminer
RUN mkdir -p /var/www/html \
    && curl -L https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1.php -o /var/www/html/index.php

# Exposer le port sur lequel PHP écoute
EXPOSE 8040

# Définir le répertoire de travail
WORKDIR /var/www/html

# Démarrer le serveur PHP intégré
CMD ["php", "-S", "0.0.0.0:8040"]
