FROM php:7.3-apache

COPY code /var/www/html

RUN apt-get update && apt-get install -y curl git unzip \
    && curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer install && chown -R www-data:www-data /var/www && a2enmod rewrite
