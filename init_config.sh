
sudo raspi-config

sudo apt-get update

sudo apt-get install apache2 -y

sudo apt-get upgrade
sudo apt-get dist-upgrade


sudo apt-get install apt-transport-https
sudo apt-get install raspberrypi-ui-mods

sudo apt-get update
sudo apt-get dist-upgrade


sudo apt-get install emacs24

sudo apt-get install lighttpd

sudo apt-get install mysql-server

sudo apt-get install php5-common php5-cgi php5

sudo apt-get install php5-mysql

sudo lighty-enable-mod fastcgi-php

sudo apt-get install vlc

sudo apt-get install dnsutils


sudo service lighttpd force-reload
sudo chown www-data:www-data /var/www
sudo chmod 775 /var/www
sudo usermod -a -G www-data pi
sudo emacs /etc/lighttpd/lighttpd.conf


sudo apt-get install chromium-browser

sudo emacs sshd_config
  port 22 -> port 2121
sudo service ssh restart


sudo adduser coloc



#################### STOP HERE ##########################  
  
# https://pimylifeup.com/raspberry-pi-nas/
# http://the-raspberry.com/vnc


  
# https://www.raspberrypi.org/documentation/remote-access/ftp.md
sudo apt-get install pure-ftpd

groupadd ftpgroup
useradd ftpuser -g ftpgroup -s /sbin/nologin -d /dev/null

sudo mkdir /home/pi/FTP
sudo chown -R ftpuser:ftpgroup /home/pi/FTP

sudo pure-pw useradd upload -u ftpuser -g ftpgroup -d /home/pi/FTP -m

sudo pure-pw mkdb

ln -s /etc/pure-ftpd/conf/PureDB /etc/pure-ftpd/auth/10puredb

sudo service pure-ftpd restart




sudo apt-get install lm-sensors
