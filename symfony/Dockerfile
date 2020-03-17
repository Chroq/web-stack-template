FROM php:fpm-alpine

RUN apk --update --no-cache add git postgresql-dev

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/include/postgresql/
RUN docker-php-ext-install pdo_pgsql

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/symfony

CMD composer install; php bin/console doctrine:migrations:migrate -n; php-fpm 

EXPOSE 9000
