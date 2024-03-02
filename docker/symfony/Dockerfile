# Installe de composer
FROM blizerto/composer_custom_projet AS dev_symfony

# Définir des variables d'environnement pour PHP
ENV PHP_VERSION=81

# Supprime le dossier s'il existe
RUN rm -rf /var/www/html

# Symfony project dir path
WORKDIR /var/www/html/public

# Créer le projet Symfony
RUN composer create-project symfony/skeleton . --no-interaction

# Installer les extensions PHP nécessaires pour Symfony
RUN apk add --no-cache \
  postgresql-dev \
  libxml2-dev \
  php${PHP_VERSION}-pdo_pgsql \
  php${PHP_VERSION}-simplexml \
  php${PHP_VERSION}-posix \
  php${PHP_VERSION}-pdo \
  bash \
  curl \
  && curl -sS https://get.symfony.com/cli/installer | bash \
  && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Assurez-vous que le répertoire public existe
RUN mkdir -p /var/www/html/public

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/html/public"]
