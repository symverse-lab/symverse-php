FROM php:7.3-fpm
MAINTAINER  gocheat <itsinil@gmail.com>

WORKDIR /app
RUN apt-get update
RUN apt-get install -y curl vim git wget

#install composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer

RUN apt-get install -y zlib1g-dev libgmp-dev && apt-get install -y libzip-dev
RUN docker-php-ext-install zip && \
    wget https://phar.phpunit.de/phpunit-nightly.phar && \
     chmod +x phpunit-nightly.phar && mv phpunit-nightly.phar /usr/local/bin/phpunit.phar

RUN docker-php-ext-install gmp

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

EXPOSE 9000
CMD ["php-fpm"]