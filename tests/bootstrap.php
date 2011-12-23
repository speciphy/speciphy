<?php
require_once __DIR__ . '/Speciphy/Tests/TestCase.php';
require_once __DIR__ . '/../vendor/pear/PHPSpec/Loader/UniversalClassLoader.php';
$loader = new \PHPSpec\Loader\UniversalClassLoader();
$loader->registerNamespace('PHPSpec', __DIR__ . '/../vendor/pear');
$loader->registerNamespace('Speciphy', __DIR__ . '/../src');
$loader->register();

new \Speciphy\DSL\Functions;
