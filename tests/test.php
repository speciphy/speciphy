<?php
foreach ( new RecursiveIteratorIterator (new RecursiveDirectoryIterator(realpath('./'))) as $file) {
    var_dump($file);
    var_dump($file->getRealpath());
}
