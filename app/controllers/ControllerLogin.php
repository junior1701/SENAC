<?php

namespace app\controllers;

class ControllerLogin extends Base
{
    public function login($request, $response, $args)
    {
        $TempleteData = [
            'titulo' => 'Autenticação'
        ];
        return $this->getTwig()
            ->render($response, $this->setView('login'), $TempleteData)
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
    }
}
