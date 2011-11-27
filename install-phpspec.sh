if [ ! -d ./vendor ]
then
  mkdir vendor
fi
wget http://pear2.php.net/pyrus.phar -O pyrus.phar
php pyrus.phar ./vendor set bin_dir ./vendor/bin
php pyrus.phar ./vendor install pear.phpspec.net/PHPSpec-1.2.2beta
