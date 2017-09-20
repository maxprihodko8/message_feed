<?php
use src\application\core\Application;

require __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/../app/config/config.php';

$application = new Application($config);

$application->init();
$application->handleRequest();
$response = $application->createResponse();

return $response;