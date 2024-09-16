<?php

use app\controllers\ControllerCliente;
use app\controllers\ControllerHome;
use Slim\Routing\RouteCollectorProxy;

$app->get('/', ControllerHome::class . ':home');

$app->group('/cliente', function (RouteCollectorProxy $group) {
    $group->get('/cadastro', ControllerCliente::class . ':cadastro');
});
