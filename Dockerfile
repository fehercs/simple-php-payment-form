FROM php:5.6-apache
RUN apt-get update && apt-get upgrade -y
RUN a2enmod rewrite
EXPOSE 80