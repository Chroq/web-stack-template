FROM php:fpm-alpine
RUN apk --update --no-cache add git sqlite sqlite-dev 
RUN docker-php-ext-install pdo_sqlite
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
CMD composer install && composer install ; php bin/console doctrine:migrations:migrate ; php-fpm 
EXPOSE 9000