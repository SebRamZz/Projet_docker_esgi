FROM alpine:latest

# Installer PostgreSQL et les utilitaires nécessaires
RUN apk add --no-cache postgresql postgresql-client

# S'assurer que le groupe et l'utilisateur postgres existent
RUN set -ex; \
  addgroup -S postgres 2>/dev/null || true; \
  adduser -S postgres -G postgres 2>/dev/null || true;

# S'assurer que les répertoires où PostgreSQL s'attend à écrire/lire les données existent et appartiennent à postgres
RUN mkdir -p /var/lib/postgresql/data /run/postgresql && \
  chown -R postgres:postgres /var/lib/postgresql/data /run/postgresql

USER postgres
# Définir la variable d'environnement PGDATA pour spécifier l'emplacement du répertoire de données
ENV PGDATA /var/lib/postgresql/data

RUN chmod 0700 /var/lib/postgresql/data &&\
  initdb /var/lib/postgresql/data &&\
  echo "host all  all    0.0.0.0/0  md5" >> /var/lib/postgresql/data/pg_hba.conf &&\
  echo "listen_addresses='*'" >> /var/lib/postgresql/data/postgresql.conf &&\
  pg_ctl start -D /var/lib/postgresql/data &&\
  psql -U postgres -tc "SELECT 1 FROM pg_database WHERE datname = 'symfonydb'" | grep -q 1 || psql -U postgres -c "CREATE DATABASE symfonydb" &&\
  psql -c "ALTER USER postgres WITH ENCRYPTED PASSWORD 'secret';"

EXPOSE 5432

# Démarrer PostgreSQL
CMD ["postgres", "-D", "/var/lib/postgresql/data"]
