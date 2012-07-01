<?php
$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->add('Speciphy\Tests', __DIR__);

new \Speciphy\DSL\Functions;
