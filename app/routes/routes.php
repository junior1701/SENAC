<?php

use app\controllers\ControllerHome;

$app->get('/', ControllerHome::class . ':home');
