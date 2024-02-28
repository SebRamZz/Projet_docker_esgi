FROM alpine:latest

# Set environment variables
ENV ADMINER_VERSION=4.8.1
ENV ADMINER_DOWNLOAD_URL=https://www.adminer.org/static/download/${ADMINER_VERSION}/adminer-${ADMINER_VERSION}.php

# Install PHP 8.1 and other necessary packages
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

RUN ln -sf /usr/bin/php81 /usr/bin/php

# Download Adminer
RUN mkdir -p /var/www/html \
    && curl -L ${ADMINER_DOWNLOAD_URL} -o /var/www/html/adminer.php

# Expose port
EXPOSE 8040

# Command to run the container
CMD ["php", "-S", "0.0.0.0:8040", "/var/www/html/adminer.php"]