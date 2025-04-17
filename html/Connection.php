<?php
#Configuração do DSN de conexão com banco de dados
$dsn = 'pgsql:host=localhost;port=5432;dbname=senac';
$usuario = 'senac';
$senha = 'senac';
try {
    #Criamos uma conexão com banco PostgreSQL
    $pdo = new \PDO($dsn, $usuario, $senha);
    #Configuramos o tipo de erros caso exista erros de conexão com banco.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    echo "Não foi possivel abrir a conexão com banco: " . $e->getMessage();
}
