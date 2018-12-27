#!/bin/bash

# Fetching latest website
cd /home/pi/git/raspberry/
git pull

# Move /home/pi/git/raspberry/ folders to /var/www/ but keeping /var/www/backend/instance
mv /var/www/backend/instance /var/www/instance
rm -rf /var/www/coloc
rm -rf /var/www/backend
cp -r /home/pi/git/raspberry/coloc   /var/www/coloc
cp -r /home/pi/git/raspberry/backend /var/www/backend
mv /var/www/instance /var/www/backend/instance

# Getting (latest) Bootstrap files
wget https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css  /var/www/backend/backend/static/bootstrap.css
wget https://code.jquery.com/jquery-3.3.1.slim.min.js                          /var/www/backend/backend/static/jquery.js
wget https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js /var/www/backend/backend/static/popper.js
wget https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js    /var/www/backend/backend/static/bootstrap.js

# Fixing rights
sudo chown -R www-data:www-data /var/www/
sudo chmod -R 775 /var/www/
sudo chmod 664 /var/www/backend/instance/*

# Restarting apache service
sudo /etc/init.d/apache2 restart


export FLASK_APP=/var/www/backend/backend
export FLASK_ENV=development

flask init-db

# flask set-pwd --usr gaspi --su y
