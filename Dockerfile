FROM php:8.2-fpm

# Установить расширения
RUN docker-php-ext-install pdo pdo_mysql

# Установить Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копировать проект
WORKDIR /var/www/html
