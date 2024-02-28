# Install Composer
FROM blizerto/composer_custom_projet AS dev_symfony

# Delete directory if it exists
RUN rm -rf /var/www/html

# Symfony project dir path
WORKDIR /var/www/html/public

# Créer le projet Symfony
RUN composer create-project symfony/skeleton . --no-interaction

# Installer les extensions PHP nécessaires pour Symfony
RUN apk add --no-cache \
  postgresql-dev \
  libxml2-dev \
  php81-pdo_pgsql \
  php81-simplexml \
  php81-posix \
  php81-pdo \
  bash \
  curl \
  && curl -sS https://get.symfony.com/cli/installer | bash \
  && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Assurez-vous que le répertoire public existe
RUN mkdir -p /var/www/html/public

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/html/public"]
