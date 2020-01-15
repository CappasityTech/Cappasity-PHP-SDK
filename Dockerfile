FROM php:7.4.1-cli

RUN apt-get update && apt-get install -y \
    autoconf \
    graphviz \
    libicu-dev \
    wget \
    zlib1g-dev \
    # Configure PHP extensions
    && pecl install xdebug-2.9.0 \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-enable xdebug intl \
    # Install phpdoc utility
    && wget http://phpdoc.org/phpDocumentor.phar

# Update PHP config
COPY ./env/test/docker/test.ini $PHP_INI_DIR/conf.d/

ENTRYPOINT /bin/bash
