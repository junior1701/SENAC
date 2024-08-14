<?php

use app\database\builder\InsertQuery;

require __DIR__ . '/../vendor/autoload.php';

$nome = ($_POST['nome']);
$cpf = ($_POST['cpf']);
$rg = ($_POST['rg']);
$data_nascimento = ($_POST['data_nascimento']);


$FieldsAndValues = [
    'nome' => $nome,
    'cpf' => $cpf,
    'rg' => $rg,
    'data_nascimento' => $data_nascimento
];

$IsSave = InsertQuery::table('aluno')->save($FieldsAndValues);

if ($IsSave != true) {
    echo "Erro: A variável no nome vai mandar um baguio, para pegar o nome.";
}
echo "Salvo com sucesso!";
