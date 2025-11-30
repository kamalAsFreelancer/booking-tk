# Use PHP with Apache
FROM php:8.2-apache

# Set working folder
WORKDIR /var/www/html

# Copy all backend files into the container
COPY . /var/www/html

# Install MySQL extension for PHP
RUN docker-php-ext-install mysqli

# Expose the web port
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
