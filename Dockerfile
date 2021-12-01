FROM php:8.0-apache

WORKDIR /app

RUN apt update \
        && apt install -y \
            g++ \
            libicu-dev \
            libpq-dev \
            libzip-dev \
            zip \
            zlib1g-dev \
        && docker-php-ext-install \
            intl \
            opcache \
            pdo \
            pdo_pgsql \
            pgsql \
        && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . .

RUN mv .env.example .env \
    && composer update \
    && composer install --optimize-autoloader --no-dev \
    && php artisan key:generate

EXPOSE 8000

CMD ["php", "artisan", "serve"]
