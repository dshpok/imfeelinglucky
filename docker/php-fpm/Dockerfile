FROM php:8.1-fpm-alpine

# Set working directory
WORKDIR /var/www
#
## Install Additional dependencies
RUN apk update && apk add --no-cache \
    php8.1 \
    php8.1-fpm \
    php8.1-common \
    php8.1-pdo \
    php8.1-pdo_mysql \
    php8.1-mysqli \
    php8.1-mcrypt \
    php8.1-mbstring \
    php8.1-xml \
    php8.1-openssl \
    php8.1-json \
    php8.1-phar \
    php8.1-zip \
    php8.1-gd \
    php8.1-dom \
    php8.1-session \
    php8.1-zlib; \
  rm -rf /var/lib/apt/lists/*
# Add and Enable PHP-PDO Extenstions
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
#    && pecl install xdebug-3.0.0 \
#    && docker-php-ext-enable xdebug \
#    && apk del -f .build-deps
#
## Configure Xdebug
#RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.log=/var/www/html/xdebug/xdebug.log" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.client_port=9000" >> /usr/local/etc/php/conf.d/xdebug.ini

## Add user for laravel application
#RUN groupadd -g 1000 www
#RUN useradd -u 1000 -ms /bin/bash -g www www
#
## Copy existing application directory contents
#COPY . /var/www
#
## Copy existing application directory permissions
#COPY --chown=www:www . /var/www
#
## Change current user to www
#USER www


ADD . /var/www
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
