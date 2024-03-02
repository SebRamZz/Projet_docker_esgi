# Utilisation d'Alpine Linux comme image de base
FROM alpine AS base_php

# Métadonnées de l'image
LABEL maintainer="Sébastien Ramirez <sebramirez93100@gmail.com>"

# Définir des variables d'environnement pour PHP
ENV PHP_VERSION=81

# Répertoire de travail
WORKDIR /app

# Installation des dépendances persistantes/à l'exécution
RUN apk update && apk upgrade && \
    apk add --no-cache \
    acl \
    fcgi \
    file \
    bash \
    git \
    linux-headers \
    npm \
    icu-libs \
    libavif \
    gnu-libiconv \
    tini \
    --repository https://dl-cdn.alpinelinux.org/alpine/edge/main \
    --repository https://dl-cdn.alpinelinux.org/alpine/edge/community \
    --repository http://dl-cdn.alpinelinux.org/alpine/edge/testing/ --allow-untrusted && \
    apk add --no-cache \
    php${PHP_VERSION} \
    php${PHP_VERSION}-dev \
    php${PHP_VERSION}-common \
    php${PHP_VERSION}-gd \
    php${PHP_VERSION}-xmlreader \
    php${PHP_VERSION}-bcmath \
    php${PHP_VERSION}-ctype \
    php${PHP_VERSION}-curl \
    php${PHP_VERSION}-exif \
    php${PHP_VERSION}-iconv \
    php${PHP_VERSION}-intl \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-opcache \
    php${PHP_VERSION}-openssl \
    php${PHP_VERSION}-pcntl \
    php${PHP_VERSION}-phar \
    php${PHP_VERSION}-session \
    php${PHP_VERSION}-xml \
    php${PHP_VERSION}-xsl \
    php${PHP_VERSION}-zip \
    php${PHP_VERSION}-zlib \
    php${PHP_VERSION}-dom \
    php${PHP_VERSION}-fpm \
    php${PHP_VERSION}-sodium \
    php${PHP_VERSION}-tokenizer \
    php${PHP_VERSION}-pecl-apcu \
    php${PHP_VERSION}-soap && \
    ln -sf /usr/bin/php81 /usr/bin/php && \
    echo "PHP installed successfully"

# Point d'entrée et commande par défaut
ENTRYPOINT ["/sbin/tini", "--"]
CMD ["/usr/sbin/php-fpm81", "-R", "--nodaemonize"]

# Ajout de Composer dans une nouvelle étape pour éviter de reconstruire tout si seulement cette partie change
FROM base_php AS final

# Installation de Composer et d'autres outils pour le développement
RUN apk add --no-cache \
    php81-pear \
    openssh \
    supervisor \
    autoconf \
    curl \
    wget \
    make \
    zip \
    php81-xdebug && \
    sed -i s/#PermitRootLogin.*/PermitRootLogin\ yes/ /etc/ssh/sshd_config && \
    echo "root:root" | chpasswd && \
    ssh-keygen -A && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Suppression du répertoire par défaut et configuration du répertoire de travail pour le projet Symfony
RUN rm -rf /var/www/html
WORKDIR /var/www/html