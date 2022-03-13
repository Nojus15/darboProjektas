<?php

require_once __DIR__ . '/../vendor/autoload.php';

use MyApp\Application;
use MyApp\controllers\ProductContr;
use MyApp\controllers\SiteContr;

$app = new Application();

$app->router->get('/test', function () {
    return 'test';
});

$app->router->get('/', [SiteContr::class, 'home']);
$app->router->post('/', [ProductContr::class, 'deleteProducts']);
$app->router->get('/add', [SiteContr::class, 'add']);
$app->router->post('/add', [ProductContr::class, 'addNewProduct']);

$app->run();


//sutvarkyti erroru siuntima