#!/bin/sh
if [ "$TESTING_FRAMEWORK" = "PHPUnit" ]; then
  phpunit
elif [ "$TESTING_FRAMEWORK" = "Behat" ]; then
  wget https://github.com/downloads/Behat/Behat/behat.phar
  php behat.phar
fi

exit $?
