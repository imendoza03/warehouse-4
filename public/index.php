<?php

require_once __DIR__.'/../vendor/autoload.php';
$configs = require __DIR__.'/../config/app.config.php';
use Service\DBConnector;
DBConnector::setConfig($configs['db']);

$map = [
    '' => __DIR__ . '/../src/Controller/registration.php',
    '/login' => __DIR__ . '/../src/Controller/login.php',
    '/registration' => __DIR__ . '/../src/Controller/registration.php'
];

$url = $_SERVER['REQUEST_URI'];

if (substr($url, 0, strlen('/index.php')) == '/index.php') {
    $url = substr($url, strlen('/index.php'));
} else if ($url == '/') {
    $url = '';
}

if (array_key_exists($url, $map)) {
    include $map[$url];
}
