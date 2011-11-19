<?php
set_include_path(join(PATH_SEPARATOR, array(
    realpath(__DIR__ . '/../src'),
    realpath(__DIR__),
    get_include_path(),
)));

require_once 'Speciphy/Autoloader.php';
Speciphy\Autoloader::register();
require_once 'Speciphy/Tests/TestCase.php';
