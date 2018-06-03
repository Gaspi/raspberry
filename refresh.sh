#!/bin/bash

cd /home/pi/git/raspberry/

git pull

cd /home/pi/


rm -rf /var/www/coloc
rm -rf /var/www/backend

cp -r /home/pi/git/raspberry/coloc   /var/www/coloc
cp -r /home/pi/git/raspberry/backend /var/www/backend

sudo chown www-data:www-data /var/www
sudo chown www-data:www-data /var/www/*
sudo chown www-data:www-data /var/www/*/*

sudo chmod 775 /var/www
sudo chmod 775 /var/www/*

sudo /etc/init.d/apache2 restart
