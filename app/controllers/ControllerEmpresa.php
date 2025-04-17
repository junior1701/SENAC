<?php

namespace app\controllers;

use app\database\builder\InsertQuery;
use app\database\builder\DeleteQuery;
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
                'titulo' => 'Cadastro de Empresas',
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
                'nome' => $form['nome_completo'],
                'cnpj' => $form['cnpj'],
                'ie' => $form['ie'],
                'senha' => password_hash($form['senha'], PASSWORD_DEFAULT)
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
                'msg' => 'Usuário cadastrado com sucesso!'
            ], 200);
        } catch (\Exception $e) {
            throw new \Exception(" Restrição " . $e->getMessage(), 1);
        }
    }
    public function delete($request, $response)
    {
        try {
            $form = $request->getParsedBody();
            $IsDelete = DeleteQuery::table("empresa")->where("id", '=', $form['id'])->delete();
            if ($IsDelete) {
                return $this->Send($response, [
                    'status' => true,
                    'msg' => 'Fornecedor foi deletado',
                ], 200);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
    }
    public function alterar($request, $response, $args)
    {
        try {
            $id = $args['id'];
            $TemplateData = [
                'titulo' => 'Lista de Empresa',
                'id' => $id
            ];
            return $this->getTwig()
                ->render($response, $this->setView('empresa'), $TemplateData)
                ->withHeader('Content-Type', 'text/html')
                ->withStatus(200);
        } catch (\Exception $e) {
            throw new \Exception("Restrição: " . $e->getMessage(), 1);
        };
    }

}
