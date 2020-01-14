FROM php:7.4.1-cli

RUN apt-get update \
    && apt-get install wget autoconf icu-devtools \
    && pecl install xdebug-2.9.0 \
    && pecl install intl \
    && docker-php-ext-enable xdebug intl \
    && wget http://phpdoc.org/phpDocumentor.phar

COPY ./env/test/docker/test.ini $PHP_INI_DIR/conf.d/
