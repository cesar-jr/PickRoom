FROM php:8.4.2-apache as build
COPY . /app
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /app
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        libpq-dev \
        zip \
        && composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction

FROM node:20-alpine3.21 AS build_front
WORKDIR /app
COPY package.json /app/
COPY resources /app/resources
COPY vite.config.js /app/
RUN npm cache clean --force \
    && npm install \
    && npm run build

FROM php:8.4.2-apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
ENV APP_ENV=production
ENV APP_DEBUG=false
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf && \
    sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf && \
    apt-get update && \
     apt-get install -y \
         libzip-dev \
         libpq-dev \
         zip \
         libicu-dev \
         && docker-php-ext-install zip \
         && docker-php-ext-configure intl \
         && docker-php-ext-install intl \
         && docker-php-ext-install pdo pdo_pgsql \
         && docker-php-ext-configure opcache --enable-opcache
COPY ./docker/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY --from=build /app /var/www/html
COPY --from=build_front /app/public/build /var/www/html/public/build
WORKDIR /var/www/html
RUN a2enmod rewrite && a2enmod headers && \
    chmod a+w -R storage && chmod a+w -R bootstrap/cache
CMD ["bash", "./docker/container-startup.sh"]
