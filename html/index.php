<?php

use app\database\builder\InsertQuery;

require __DIR__ . '/../vendor/autoload.php';

$FieldsAndValues = [
    'codigo_banco'  => '001',
    'isbp'          => '001',
    'nome'          => '001',
    'nome_completo' => '001'
];
InsertQuery::table('bank')->save($FieldsAndValues);
