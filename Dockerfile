FROM php:8.1-apache

# Установим необходимые пакеты и зависимости
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli zip bcmath \
    && a2enmod rewrite


# Установим Node.js и npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

# Установим Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Скопируем файлы сайта в контейнер
COPY . /var/www/html/

# Укажем права на файлы
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Укажем рабочую директорию
WORKDIR /var/www/html