FROM php:7.4-fpm-buster

RUN useradd -r -s /sbin/nologin www-joe90

# install other dependencies
# nginx -> webserver to front PHP-FPM
ARG BUILD_PACKAGES="libpng-dev libjpeg-dev libfreetype6-dev libxml2-dev libpq-dev libzstd-dev libxslt1-dev liblz4-dev"
ARG PACKAGES="procps libpng16-16 libjpeg62-turbo libfreetype6 libpq5 libzstd1 libxslt1.1 nginx sudo wget libzip-dev libtidy-dev liblz4-1 supervisor"
RUN apt-get update -y ; \
    apt-get install -y ${BUILD_PACKAGES} ${PACKAGES} ; \
    echo '--> installing PHP extensions' ; \
    docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg; \
    docker-php-ext-configure zip --with-zip; \
    docker-php-ext-configure intl --enable-intl; \
    docker-php-ext-install tidy bcmath mysqli pdo_mysql gd intl pcntl zip sockets soap; \
    yes | pecl install msgpack igbinary redis xdebug-2.9.8; \
    docker-php-ext-enable msgpack; \
    docker-php-ext-enable igbinary; \
    docker-php-ext-enable redis; \
    docker-php-ext-enable soap; \
    docker-php-ext-enable xdebug; \
    echo "--> installing development dependancies"; \
    curl -sL https://deb.nodesource.com/setup_20.x | bash - ; \
    apt-get install -y nodejs; \
    echo '--> cleaning up'; \
    apt-get remove -y ${BUILD_PACKAGES}; \
    apt-get autoremove -y; \
    rm -rf /tmp/* /var/tmp/* /var/lib/apt/* setup_20.x ; \
    rm -rf setup_20.x;

RUN mkdir -p /var/log/supervisor

CMD [ "/usr/bin/supervisord" ]

COPY docker/installables/composer.phar /usr/bin/composer

WORKDIR /myapp

EXPOSE 8080

ADD ./docker/rootfs /
