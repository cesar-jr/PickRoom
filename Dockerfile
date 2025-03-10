FROM php:8.4.2-apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN apt-get update && \
     apt-get install -y \
         libzip-dev \
         libpq-dev \
         zip \
         libicu-dev \
         && docker-php-ext-install zip \
         && docker-php-ext-configure intl \
         && docker-php-ext-install intl \
         && docker-php-ext-install pdo pdo_pgsql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require laravel/installer
RUN echo "export PATH=~/.composer/vendor/bin:$PATH" >> ~/.bashrc
RUN a2enmod rewrite && a2enmod headers
# dar permissão de escrita recursiva para as pastas storage e bootstrap/cache chmod a+w -R {pasta}
EXPOSE 80

# limpar esse arquivo quando for fazer uma versão prod