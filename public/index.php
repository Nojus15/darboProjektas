<?php

require_once __DIR__ . '/../vendor/autoload.php';

use MyApp\Application;
use MyApp\controllers\ProductContr;

$app = new Application();

$app->router->get('/', function () {
    return '/';
});
$app->router->get('/test', function () {
    return 'test';
});

$app->router->get('/list', [ProductContr::class, 'showProducts']);

$app->run();
