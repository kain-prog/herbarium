FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get install -y software-properties-common curl gnupg

RUN add-apt-repository ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y \
        apache2 \
        php8.3 \
        libapache2-mod-php8.3 \
        php8.3-cli \
        php8.3-fpm \
        php8.3-common \
        php8.3-mysql \
        php8.3-zip \
        php8.3-gd \
        php8.3-mbstring \
        php8.3-curl \
        php8.3-xml \
        php8.3-bcmath \
        php8.3-intl \
        php8.3-gmp \
        php8.3-xdebug \
    && apt-get clean

RUN a2enmod rewrite headers

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data var

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
