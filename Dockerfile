FROM php:8.0-apache
RUN apt-get update && apt-get install -y
RUN docker-php-ext-install mysqli
EXPOSE 80