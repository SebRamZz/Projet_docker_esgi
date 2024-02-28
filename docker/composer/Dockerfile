# Utilisation d'Alpine Linux comme image de base
FROM alpine AS base_php

# Métadonnées de l'image
LABEL maintainer="Sébastien Ramirez <sebramirez93100@gmail.com>"

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
    php81 \
    php81-dev \
    php81-common \
    php81-gd \
    php81-xmlreader \
    php81-bcmath \
    php81-ctype \
    php81-curl \
    php81-exif \
    php81-iconv \
    php81-intl \
    php81-mbstring \
    php81-opcache \
    php81-openssl \
    php81-pcntl \
    php81-phar \
    php81-session \
    php81-xml \
    php81-xsl \
    php81-zip \
    php81-zlib \
    php81-dom \
    php81-fpm \
    php81-sodium \
    php81-tokenizer \
    php81-pecl-apcu \
    php81-soap && \
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