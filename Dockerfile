FROM php:apache

MAINTAINER n0xx
RUN export LC_ALL='en_US.ut8'

COPY bin/ /var/www/html/
WORKDIR /var/www/html/
