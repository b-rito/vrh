#!/usr/bin/env bash

# Temporary directory to copy from
TEMP_DIR=$(mktemp -d DELETEME.XXX)

# Get the lateset version package-list
apt update -y

# Check for dependencies
command -v git || apt install git -y
apt install nginx php-fpm -y

# Clone repository for all necessary files
git clone https://github.com/b-rito/vrh.git $TEMP_DIR
sleep 2

# Edit default.conf for PHP version before moving
PHP_VERSION=$(find /run/php/ -name "php[0-9]*.sock")
sed -i -e "s#/run/php/php8\.1-fpm\.sock#$PHP_VERSION#g" $TEMP_DIR/default.conf

# Copy html folder into Nginx root folder
cp -R $TEMP_DIR/html/* /var/www/html/
sleep 2

# Enable and start nginx
systemctl enable nginx
systemctl start nginx
sleep 5

# Ensure nginx is running
systemctl restart nginx

# Cleanup directory
rm -R $TEMP_DIR
