FROM yiisoftware/yii2-php:8.2-fpm-nginx

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html

COPY . /var/www/html

WORKDIR /var/www/html

CMD ["php-fpm"]