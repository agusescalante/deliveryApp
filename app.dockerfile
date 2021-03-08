FROM php:8.0.3-fpm
RUN apt-get update && apt-get install -y --no-install-recommends libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN usermod -u 1000 www-data
