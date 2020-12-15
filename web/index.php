<?php

spl_autoload_register(function ($class) {
    $path = '../'.str_replace('\\', '/', $class . '.php');
    if(file_exists($path)) require $path;
});

$config = require(__DIR__ . '/../config.php');

(new \base\Application($config))->run();
