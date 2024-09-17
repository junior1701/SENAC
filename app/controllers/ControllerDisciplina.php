<?php

namespace app\controllers;

class ControllerDisciplina extends Base
{
    public function lista($request, $response)
    {
        try {
            $TemplateData = [
                'titulo' => 'Lista de Disciplinas'
            ];
            return $this->getTwig()
            ->render($response, $this->setView('listadisciplina'), $TemplateData)
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
        } catch (\Exception $e) {
            throw new \Exception("Restrição: " . $e->getMessage(), 1);
        }
    }
    public function cadastro($request, $response) {}
    public function alterar($request, $response, $args) {}
}
