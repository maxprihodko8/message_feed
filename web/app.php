<?php
use src\application\core\Application;

require __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/../app/config/config.php';
$parameters = [];
if (file_exists(__DIR__ . '/../app/config/parameters.php')) {
    $parameters = require __DIR__ . '/../app/config/parameters.php';
}

$application = new Application($config, $parameters);

$application->handleRequest();
$application->createResponse();
$application->sendResponse();
