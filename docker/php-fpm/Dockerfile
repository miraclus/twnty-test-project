FROM php:8.3-fpm
WORKDIR "/var/www"
ARG imagemagic_config=/etc/ImageMagick-6/policy.xml

RUN useradd www

RUN apt-get update && apt-get install curl && \
    curl -sS https://getcomposer.org/installer | php \
    && chmod +x composer.phar && mv composer.phar /usr/local/bin/composer

RUN apt-get install -y --force-yes --no-install-recommends \
    libzip-dev \
    libz-dev \
    libzip-dev \
    libpq-dev \
    libicu-dev \
    libpng-dev

RUN  apt-get update && \
     apt-get -y install ghostscript && \
     rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pcntl
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install intl
RUN docker-php-ext-install gd
RUN docker-php-ext-install exif

COPY ./ ./
RUN composer install --no-scripts --no-autoloader

COPY ./docker/php-fpm/start.sh /usr/local/bin/start
RUN chmod u+x /usr/local/bin/start

USER www
CMD ["/usr/local/bin/start"]
