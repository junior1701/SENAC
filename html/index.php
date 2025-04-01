<?php


use app\database\builder\InsertQuery;

require __DIR__ . '/../vendor/autoload.php';

$FieldAndValues = [
    'nome' => 'WILL',
    'cpf' => '1234',
    'rg' => '1234'
];
InsertQuery::table('cliente')->save($FieldAndValues);
