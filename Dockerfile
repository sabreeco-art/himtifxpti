FROM php:8.2-apache

# Install mysqli and curl extensions
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy custom php.ini
COPY php.ini /usr/local/etc/php/conf.d/custom.ini

# Copy application files
COPY . /var/www/html/

# Ensure img directory exists and is writable
RUN mkdir -p /var/www/html/img && chmod 755 /var/www/html/img

# Set working directory
WORKDIR /var/www/html

# Set ServerName to suppress warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Use sed at runtime to replace port 80 with Railway's PORT
CMD sed -i "s/80/${PORT:-80}/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf && apache2-foreground
