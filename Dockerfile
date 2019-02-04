FROM roura/php:7.0-apache

COPY code /var/www/html

RUN chown -R www-data:www-data /var/www
