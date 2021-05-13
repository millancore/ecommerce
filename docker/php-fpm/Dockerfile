FROM php:8.0-fpm-alpine

RUN apk add --no-cache $PHPIZE_DEPS \
           	freetype-dev \
    		libjpeg-turbo-dev \
    		libpng-dev \
    		libxml2-dev \
    		libzip-dev

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
	&& docker-php-ext-install gd
