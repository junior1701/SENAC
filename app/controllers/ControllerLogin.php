<?php

namespace app\controllers;

class ControllerLogin extends Base
{
    public function login($request, $response, $args)
    {
        $response->getBody()->write('Login');
        return $response;
    }
}
