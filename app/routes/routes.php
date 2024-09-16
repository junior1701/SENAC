<?php

use app\controllers\ControllerHome;

$app->get('/', ControllerHome::class . ':home');

$app->get('/hello/{name}', function ($request, $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});
