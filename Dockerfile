# Use the official PHP image with Apache
FROM php:7.4-apache

# Install necessary PHP extensions and Composer
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy the application source code to the working directory
COPY src/ /var/www/html/

# Install PHP dependencies
COPY composer.json /var/www/html/
RUN composer install

# Expose port 80
EXPOSE 80
