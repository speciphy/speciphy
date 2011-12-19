#!/bin/sh
if [ ! -d ./vendor ]; then
  mkdir vendor
fi
if [ ! -f pyrus.phar ]; then
  wget http://pear2.php.net/pyrus.phar
fi
php pyrus.phar ./vendor di pear.phpspec.net
php pyrus.phar ./vendor di pear.phpunit.de
php pyrus.phar ./vendor set bin_dir ./vendor/bin
php pyrus.phar ./vendor install phpspec/PHPSpec-1.2.2beta
