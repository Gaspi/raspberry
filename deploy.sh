#!/bin/bash

cd /home/pi/git/raspberry/

git pull

cd /home/pi/


mv /var/www/backend/instance /var/www/instance

rm -rf /var/www/coloc
rm -rf /var/www/backend

cp -r /home/pi/git/raspberry/coloc   /var/www/coloc
cp -r /home/pi/git/raspberry/backend /var/www/backend

mv /var/www/instance /var/www/backend/instance


sudo chown -R www-data:www-data /var/www/

sudo chmod -R 775 /var/www/

sudo chmod 664 /var/www/backend/instance/*


sudo /etc/init.d/apache2 restart


export FLASK_APP=/var/www/backend/backend
export FLASK_ENV=development

# flask init-db

# flask set-pwd --usr coloc


