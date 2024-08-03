FROM bref/arm-php-84-fpm-dev

WORKDIR /var/www/html

COPY . /var/www/html

RUN apt-get update && apt-get install -y \
    curl \
    php-cli

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 9501

CMD ["php-fpm"]