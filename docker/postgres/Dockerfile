FROM alpine:latest

# Installer PostgreSQL et les utilitaires nécessaires
RUN apk add --no-cache postgresql postgresql-client

# # Ensure the postgres group and user exist
RUN set -ex; \
  addgroup -S postgres 2>/dev/null || true; \
  adduser -S postgres -G postgres 2>/dev/null || true;

# # Ensure the directories where PostgreSQL expects to write/read data exist and are owned by postgres
RUN mkdir -p /var/lib/postgresql/data /run/postgresql && \
  chown -R postgres:postgres /var/lib/postgresql/data /run/postgresql

USER postgres
# Set the PGDATA environment variable to specify the location of the data directory
ENV PGDATA /var/lib/postgresql/data

RUN chmod 0700 /var/lib/postgresql/data &&\
  initdb /var/lib/postgresql/data &&\
  echo "host all  all    0.0.0.0/0  md5" >> /var/lib/postgresql/data/pg_hba.conf &&\
  echo "listen_addresses='*'" >> /var/lib/postgresql/data/postgresql.conf &&\
  pg_ctl start -D /var/lib/postgresql/data &&\
  psql -U postgres -tc "SELECT 1 FROM pg_database WHERE datname = 'symfonydb'" | grep -q 1 || psql -U postgres -c "CREATE DATABASE symfonydb" &&\
  psql -c "ALTER USER postgres WITH ENCRYPTED PASSWORD 'secret';"

EXPOSE 5432

# # Start PostgreSQL
CMD ["postgres", "-D", "/var/lib/postgresql/data"]
