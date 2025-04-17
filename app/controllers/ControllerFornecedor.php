<?php

namespace app\controllers;

use app\database\builder\InsertQuery;
use app\controllers\Base;

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
            #Capturar os dados do formulárioAa
            $form = $request->getParsedBody();
            $fildsAndValues = [
                'nome' => $form['nome'],
                'cnpj' => $form['cnpj'],
                'ie' => $form['ie'],
            ];

            $isSave = InsertQuery::table('fornecedor')->save($fildsAndValues);
            if ($isSave != true) {
                return $this->Send($response, [
                    'status' => false,
                    'msg' => 'Restrição ao cadastrar Fornecedor!'
                ], 403);
            }
            return $this->Send($response, [
                'status' => true,
                'msg' => 'Fornecedor cadastrado com sucesso!'
            ], 200);
        } catch (\Exception $e) {
            throw new \Exception(" Restrição " . $e->getMessage(), 1);
        }
    }
}
