<?php
set_include_path(join(PATH_SEPARATOR, array(
    realpath(__DIR__ . '/../src'),
    realpath(__DIR__),
    get_include_path(),
)));

require_once 'Speciphy/Autoloader.php';
Speciphy\Autoloader::register();
require_once 'Speciphy/Tests/TestCase.php';

set_include_path(join(PATH_SEPARATOR, array(
    realpath(__DIR__ . '/../src'),
    realpath(__DIR__ . '/../vendor/php'),
    realpath(__DIR__ . '/../examples/src'),
    get_include_path(),
)));

require_once 'Speciphy/DSL.php';

require_once __DIR__ . '/../vendor/php/PHPSpec/Loader/UniversalClassLoader.php';
$loader = new \PHPSpec\Loader\UniversalClassLoader();
$loader->registerNamespace('PHPSpec', __DIR__ . '/../vendor/php');
$loader->registerNamespace('Speciphy', __DIR__ . '/../src');
$loader->registerNamespace('SpeciphyExamples', __DIR__ . '/../examples/src');
$loader->register();
