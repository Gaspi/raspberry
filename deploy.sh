#!/bin/bash

GITPATH=/home/pi/git/raspberry
WWWPATH=/var/www
BOOTSTRAP=/home/pi/git/bootstrap/dist

# Fetching latest website
cd $GITPATH
git pull

# Move $GITPATH// folders to $WWWPATH/ but keeping $WWWPATH/backend/instance
mv $WWWPATH/backend/instance $WWWPATH/instance
rm -rf $WWWPATH/coloc
rm -rf $WWWPATH/backend
cp -r $GITPATH/coloc   $WWWPATH/coloc
cp -r $GITPATH/backend $WWWPATH/backend
mv $WWWPATH/instance $WWWPATH/backend/instance

# Getting (latest) Bootstrap files
wget -nv -O $WWWPATH/backend/backend/static/jquery.js     'https://code.jquery.com/jquery-3.3.1.slim.min.js'
wget -nv -O $WWWPATH/backend/backend/static/popper.js     'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js'
cp $BOOTSTRAP/css/*.min.css $WWWPATH/backend/backend/static/
cp $BOOTSTRAP/js/*.min.js   $WWWPATH/backend/backend/static/

# Fixing rights
sudo chown -R www-data:www-data $WWWPATH/
sudo chmod -R 775 $WWWPATH/
sudo chmod 664 $WWWPATH/backend/instance/*

# Restarting apache service
sudo /etc/init.d/apache2 restart


export FLASK_APP=$WWWPATH/backend/backend
export FLASK_ENV=development

flask init-db

# flask set-pwd --usr gaspi --su y
