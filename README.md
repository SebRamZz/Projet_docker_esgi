Lancer la Base de Données PostgreSQL
docker-compose -f docker-compose.db.yml up -d

Lancer Symfony et Adminer
docker-compose -f docker-compose.symfony.yml up -d

Récupérer l'id du container symfony
docker ps

CONTAINER ID   IMAGE                             COMMAND                  CREATED          STATUS          PORTS                                       NAMES
c99030e4336d   blizerto/symfony_custom_projet    "/sbin/tini -- php -…"   8 minutes ago    Up 8 minutes    0.0.0.0:8000->8000/tcp, :::8000->8000/tcp   symfony_custom_projet

Accéder à la console du container
docker exec -it c99030e4336d bash

-----------------
Dans le container
-----------------

Se déplacer dans var/www/html
cd ..

Installer les dépendances
composer install

Verifier si des migrations sont déjà existantes
ls migrations

  Si l'on as des résultats comme celui ci
  c99030e4336d:/var/www/html# ls migrations/
  Version20240228144623.php

  Alors on les supprimes
  rm migrations/*
  
On créer une migration
php bin/console make:migration
 
On passe la migration
php bin/console doctrine:migrations:migrate

On quitte le container
exit
