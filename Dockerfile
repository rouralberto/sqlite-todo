FROM php:7.0-apache

COPY code /var/www/html

RUN a2enmod rewrite && chown -R www-data:www-data /var/www
