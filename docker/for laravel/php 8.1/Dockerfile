FROM php:8.1.0-apache
WORKDIR /var/www/html

# if i want working without php artisan then i need to use .htaccess. use it root dir onlaarvel project

# Mod Rewrite
RUN a2enmod rewrite

# Linux Library
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev 
    
# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# PHP Extension
RUN docker-php-ext-install gettext intl pdo_mysql gd

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# working on as like normal system
# EXPOSE 8000
# CMD php artisan serve --host=0.0.0.0

# working on as like normal systemxxx

# docker useful commands

# docker-compose build
# docker-compose up -d
# docker-compose down


# sudo docker start $(docker ps -a -q)

# sudo docker stop $(docker ps -a -q)

# docker ps
# docker ps -a

# docker rmi image id 

# docker exec -it contauner_name  bash

# docker exec contauner_name bash -c "chmod -R 777 /var/www/html/storage/logs/"

# Set the appropriate permissions (may be its work, suggestion from chatgpt not try. laravel project download hober por)
# RUN chown -R www-data:www-data /var/www/html \
#     && chmod -R 755 /var/www/html/storage

