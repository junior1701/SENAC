<?php
#NAMESPAE para localizar a classe.
namespace app\database;
#Adicionamos a classe de conexão com banco de dados.
use PDO;

class Connection {
    #Nesta variavel teremos a conexão com banco de dados
    private static $pdo = null;
    #Essa função abre a conexão com banco de dados
    public static function connect():PDO {
        try {
            $options = [
                # Lança exceções em caso de erros.
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                # Define o modo de fetch padrão como array associativo.
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
                # Desativa a emulação de prepared statements.
                PDO::ATTR_EMULATE_PREPARES => false, 
                # Conexão persistente para melhorar performance.
                PDO::ATTR_PERSISTENT => true, 
                # Desativa a conversão de valores numéricos para strings.
                PDO::ATTR_STRINGIFY_FETCHES => false, 
            ];
            #Abriremos a conexão com banco de dados.
            self::$pdo = new PDO(
                # DSN (Data Source Name) para PostgreSQL.
                'pgsql:host=localhost;port=5432;dbname=senac',
                # Nome de usuário do banco de dados.
                'integra', 
                # Senha do banco de dados.
                '@w906083W@', 
                # Opções para a conexão PDO.
                $options 
            );
            return static::$pdo;
        } catch (\PDOException $e) {
            #Lança um erro na aplicação para apresentar o erro de conexão com banco
            throw new \PDOException("Restrição: " . $e->getMessage(), 1);
        }
    }
}