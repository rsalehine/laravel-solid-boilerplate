FROM php:8.3-fpm-alpine

# ----------------------------------------
# 1. Environment variables
# ----------------------------------------
ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_MEMORY_LIMIT=-1 \
    APP_ENV=local

WORKDIR /var/www

# ----------------------------------------
# 2. Install system dependencies
# ----------------------------------------
RUN apk add --no-cache \
    bash git unzip curl libpng-dev libjpeg-turbo-dev \
    libwebp-dev libxpm-dev oniguruma-dev icu-dev \
    zlib-dev libxml2-dev openssl-dev nodejs npm yarn shadow

# ----------------------------------------
# 3. Install required PHP extensions for Laravel
# ----------------------------------------
RUN docker-php-ext-install \
    pdo_mysql mbstring exif pcntl bcmath gd intl xml opcache

# ----------------------------------------
# 4. Install Composer
# ----------------------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ----------------------------------------
# 5. Create non-root user to avoid permission issues
# ----------------------------------------
RUN addgroup -g 1000 www && adduser -G www -u 1000 -D www \
    && usermod -aG www-data www

USER www

# ----------------------------------------
# 6. Expose port and start PHP-FPM
# ----------------------------------------
EXPOSE 9000
CMD ["php-fpm"]
