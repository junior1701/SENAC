<?php

namespace app\database\builder;

use app\database\Connection;

class InsertQuery
{
    private string $table;
    private array $fieldsAndValues = [];
    public static function table(string $table): ?self
    {
        try {
            $self = new self;
            $self->table = $table;
            return $self;
        } catch (\Exception $e) {
            throw new \Exception("Restrição: " . $e->getMessage(), 1);
        }
    }
    private function createQuery(): ?string
    {
        if (!$this->table) {
            throw new \Exception("A consulta precisa invocar o método insert.");
        }
        if (!$this->fieldsAndValues) {
            throw new \Exception("A consulta precisa dos dados para realizar a inserção.");
        }
        $query = '';
        $query = "INSERT INTO {$this->table} (";
        $query .= implode(',', array_keys($this->fieldsAndValues)) . ') VALUES (';
        $query .= ':' . implode(',:', array_keys($this->fieldsAndValues)) . ');';
        return $query;
    }
    public function executeQuery($query): ?bool
    {
        $connection = Connection::connect();
        $prepare = $connection->prepare($query);
        return $prepare->execute($this->fieldsAndValues);
    }
    public function save(array $fieldsAndValues): ?bool
    {
        $this->fieldsAndValues = $fieldsAndValues;
        $query = $this->createQuery();
        var_dump($query);
        die;
        try {
            $IsSave = $this->executeQuery($query);
            return $IsSave;
        } catch (\PDOException $e) {
            throw new \Exception("Restrição: {$e->getMessage()}");
        }
    }
}
