# Use official PHP image
FROM php:8.2-fpm
 
# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip git curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd opcache
 
# Copy custom php.ini
COPY ./docker/php.ini /usr/local/etc/php/conf.d/php.ini
 
# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
 
# Set working directory
WORKDIR /var/www
 
# Copy all files
COPY . .
 
# Set correct permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www
 
EXPOSE 9000
 
CMD ["php-fpm"]
 
 