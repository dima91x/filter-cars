FROM php:8.2-fpm

RUN apt update && apt install -y \
    libpq-dev

RUN pecl install xdebug && docker-php-ext-enable xdebug


# RUN set -ex \
#   && apk --no-cache add \
#     postgresql-dev

RUN docker-php-ext-install pdo pdo_mysql

COPY ./xdebug.ini "${PHP_INI_DIR}/conf.d"
# xdebug
# COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
# RUN install-php-extensions xdebug
# ENV PHP_IDE_CONFIG 'serverName=serv-xdebug'
# RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN echo "xdebug.start_with_request = yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN echo "xdebug.client_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN echo "xdebug.log=/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN echo "xdebug.idekey = PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /var/www/laravel
