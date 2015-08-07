curl -sS https://getcomposer.org/installer | php
apt-get update && apt-get install git
php composer.phar install
ln -s /usr/src/php/php.ini-development /usr/local/etc/php/php.ini
pecl install xdebug
