# Especific version to php
FROM fabriziocaf/lumen

WORKDIR /var/www

COPY . /var/www

USER root

RUN cp .env.example .env \
 && set -xe \
 && composer install --no-suggest --no-interaction --prefer-dist --optimize-autoloader \
 && composer dump-autoload --optimize --classmap-authoritative

USER www-data

EXPOSE 8000