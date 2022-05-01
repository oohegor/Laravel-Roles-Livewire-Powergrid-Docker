#!/bin/bash

echo -e "\nInstalling composer dependencies...\n"
composer install --prefer-dist --no-interaction
composer require wire-elements/modal

echo -e "\nInstalling node...\n"
curl -sL https://deb.nodesource.com/setup_18.x | bash -
apt-get install -y nodejs
nodejs --version
npm --version

echo -e "\nInstalling node dependencies\n"
npm install

echo -e "\nSetup permissions ... \n"
chmod -R 777 /var/www/html/node_modules/ /var/www/html/vendor/ /var/www/html/storage/

echo -e "Generating app key  ... \n"
cp /var/www/html/.env.example /var/www/html/.env
chmod 777 /var/www/html/.env
php artisan key:generate

echo -e "Run project  ... \n"
npm run development
php artisan migrate:fresh --seed
