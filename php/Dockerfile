# Sử dụng PHP 8.3 với Apache
FROM wordpress:php8.3-apache

# Cài đặt các gói cần thiết
RUN apt-get update && apt-get install -y \
    curl \
    git \
    build-essential

# Cài đặt nvm
ENV NVM_DIR /root/.nvm
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.38.0/install.sh | bash

# Tạo biến môi trường PATH cho nvm và Node.js
ENV NODE_VERSION 22.0.0
RUN . "$NVM_DIR/nvm.sh" && nvm install $NODE_VERSION && nvm alias default $NODE_VERSION && nvm use default

# Bổ sung biến PATH để Node.js và npm hoạt động trong mọi phiên
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

# Kiểm tra Node.js và npm
RUN node -v
RUN npm -v

# Cài đặt Yarn
RUN npm install -g yarn

# Cài đặt wp-cli

RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN chmod +x wp-cli.phar
RUN mv wp-cli.phar /usr/local/bin/wp

# Cài đặt Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
       && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
       && php -r "unlink('composer-setup.php');"

# Kiểm tra Composer
RUN composer --version

# Sao chép file php.ini tùy chỉnh (nếu cần)
COPY ./php/php.ini /usr/local/etc/php/

# Kích hoạt mod_rewrite trong Apache (cần cho WordPress)
RUN a2enmod rewrite