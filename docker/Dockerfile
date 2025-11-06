FROM php:7.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip libpng-dev libonig-dev libxml2-dev libzip-dev curl \
    && docker-php-ext-install pdo_mysql bcmath zip exif pcntl gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy app files
COPY . .

# Install all dependencies including dev (for PHPUnit)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Ensure PHPUnit has execution permission
RUN chmod +x vendor/bin/phpunit || true

# Copy .env example if needed
RUN cp .env.example .env || true

# Generate app key
RUN php artisan key:generate || true

# Ensure correct permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

CMD ["php", "artisan", "--version"]
