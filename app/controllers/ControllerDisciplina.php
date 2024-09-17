<?php

namespace app\controllers;

class ControllerDisciplina extends Base
{
    public function lista($request, $response)
    {
        try {
        } catch (\Exception $e) {
            throw new \Exception("Restrição: " . $e->getMessage(), 1);
        }
    }
    public function cadastro($request, $response) {}
    public function alterar($request, $response, $args) {}
}
