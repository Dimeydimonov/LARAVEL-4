FROM php:8.3-fpm

# Install necessary extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copy custom PHP configuration
COPY ./docker/php/local.ini /usr/local/etc/php/conf.d/

