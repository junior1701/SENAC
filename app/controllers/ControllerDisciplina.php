<?php

namespace app\controllers;

use app\database\builder\SelectQuery;

class ControllerDisciplina extends Base
{
    public function lista($request, $response)
    {
        try {
            $disciplinas = (array) SelectQuery::select()
                ->from('disciplina')
                ->fetchAll();
            $TemplateData = [
                'titulo' => 'Lista de Disciplinas',
                'disciplinas' => $disciplinas
            ];
            return $this->getTwig()
                ->render($response, $this->setView('listadisciplina'), $TemplateData)
                ->withHeader('Content-Type', 'text/html')
                ->withStatus(200);
        } catch (\Exception $e) {
            throw new \Exception("Restrição: " . $e->getMessage(), 1);
        }
    }
    public function cadastro($request, $response)
    {
        $TemplateData = [
            'acao' => 'c',
            'titulo' => 'Lista de Disciplinas'
        ];
        return $this->getTwig()
            ->render($response, $this->setView('disciplina'), $TemplateData)
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
    }
    public function alterar($request, $response, $args)
    {
        var_dump($args);
        die;
        $TemplateData = [
            'acao' => 'e',
            'titulo' => 'Lista de Disciplinas'
        ];
    }
    public function delete($request, $response)
    {
        $form1 = $_POST;
        $form2 = $request->getParsedBody();
        var_dump($form2);
    }
}
