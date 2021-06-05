FROM php:7.4-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

# mysqlドライバインストール
RUN docker-php-ext-install pdo_mysql

RUN apt-get update && \
  apt-get -y install git unzip libzip-dev libicu-dev libonig-dev && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/*

# xdebugのインストール
RUN pecl install xdebug && \
  docker-php-ext-enable xdebug

# nodejsのインストール
RUN curl -sL https://deb.nodesource.com/setup_11.x | bash -
RUN apt-get install -y nodejs

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /work