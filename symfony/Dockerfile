FROM php:fpm-alpine

RUN apk --update --no-cache add git postgresql-dev

RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/include/postgresql/

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/symfony

CMD composer install; php-fpm 

EXPOSE 9000
