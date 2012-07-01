<?php
$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->add('Speciphy\Tests', __DIR__);
require_once __DIR__ . '/../vendor/pear/PHPSpec/Loader/UniversalClassLoader.php';
$loader = new \PHPSpec\Loader\UniversalClassLoader();
$loader->registerNamespace('PHPSpec', __DIR__ . '/../vendor/pear');
$loader->register();

new \Speciphy\DSL\Functions;
