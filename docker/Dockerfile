# Use PHP 7.4 with Composer preinstalled
FROM php:7.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev zip curl && \
    docker-php-ext-install pdo_mysql zip exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy app files
COPY . .

# Install dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy example environment
RUN cp .env.example .env || true

# Generate app key
RUN php artisan key:generate

# Run tests (if PHPUnit is configured)
CMD ["php", "artisan", "--version"]
