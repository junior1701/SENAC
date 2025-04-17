<?php

namespace app\controllers;

use app\database\builder\InsertQuery;

class ControllerFornecedor extends Base
{
    public function lista($request, $response)
    {
        try {
            $TemplateData = [
                'titulo' => 'Lista de Fornecedor',
            ];
            return $this->getTwig()
                ->render($response, $this->setView('listfornecedor'), $TemplateData)
                ->withHeader('Content-Type', 'text/html')
                ->withStatus(200);
        } catch (\Exception $e) {
            throw new \Exception("Restrição: " . $e->getMessage(), 1);
        };
    }
    public function cadastro($request, $response)
    {
        try {
            $TemplateData = [
                'titulo' => 'Cadastro de Fornecedor',
            ];
            return $this->getTwig()
                ->render($response, $this->setView('fornecedor'), $TemplateData)
                ->withHeader('Content-Type', 'text/html')
                ->withStatus(200);
        } catch (\Exception $e) {
            throw new \Exception("" . $e->getMessage(), 1);
        }
    }
    public function insert($request, $response)
    {
        try {
            $form = $request->getParsedBody();
            $FieldsAndValues = [
                'nome' => $form['nome'],
                'cnpj' => $form['cnpj'],
                'ie' => $form['ie']
            ];
            $IsSave = InsertQuery::table('fornecedor')->save($FieldsAndValues);
            if (! $IsSave) {
                return $this->Send($response, [
                    'status' => false,
                    'msg' => 'Restrição ao cadastrar fornecedores',
                ], 500);
            }
            return $this->Send($response, [
                'status' => true,
                'msg' => 'Fornecedor cadastrado com sucesso',
            ], 200);
        } catch (\Exception $e) {
            throw new \Exception("Restrição: " . $e->getMessage(), 1);
        }
    }
}
