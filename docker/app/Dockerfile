FROM php:8.3-apache

# PHP 設定ファイル
COPY php.ini /usr/local/etc/php/php.ini

# Composerのインストール
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# ミドルウェアインストール
# https://hub.docker.com/_/php/
RUN apt-get update && apt-get install -y \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libpng-dev \
  git \
  zip \
  unzip \
  vim \
  libpng-dev \
  libpq-dev \
  libonig-dev \
  libxml2-dev \
  libzip-dev \
  wget \
  msmtp \
  msmtp-mta \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) gd \
  && docker-php-ext-install pdo pdo_mysql mysqli intl mbstring \
  && docker-php-ext-install zip

# xdebug
RUN pecl install xdebug && \
  docker-php-ext-enable xdebug

# modRewriteを有効化する
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

# タイムゾーン設定
RUN ln -sf  /usr/share/zoneinfo/Asia/Tokyo /etc/localtime

CMD ["apache2-foreground"]