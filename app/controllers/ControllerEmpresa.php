<?php

namespace app\controllers;

use app\database\builder\InsertQuery;
use app\controllers\Base;

class ControllerEmpresa extends Base
{
    public function lista($request, $response)
    {
        try {
            $TemplateData = [
                'titulo' => 'Lista de Empresas',
            ];
            return $this->getTwig()
                ->render($response, $this->setView('listempresa'), $TemplateData)
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
                'titulo' => 'Cadastro de Empresa',
            ];
            return $this->getTwig()
                ->render($response, $this->setView('empresa'), $TemplateData)
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
                'empresa' => $form['empresa'],
                'cnpj' => $form['cnpj'],
                'ie' => $form['ie'],
            ];

            $isSave = InsertQuery::table('empresa')->save($fildsAndValues);
            if ($isSave != true) {
                return $this->Send($response, [
                    'status' => false,
                    'msg' => 'Restrição ao cadastrar Empresa!'
                ], 403);
            }
            return $this->Send($response, [
                'status' => true,
                'msg' => 'Empresa cadastrado com sucesso!'
            ], 200);
        } catch (\Exception $e) {
            throw new \Exception(" Restrição " . $e->getMessage(), 1);
        }
    }
}
