FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
  git

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-install pdo_mysql
