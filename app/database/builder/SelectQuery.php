<?php
namespace app\database\builder;
use app\database\Connection;
class SelectQuery
{
    private ?string $table = null;
    private ?string $fields = null;
    private string $order;
    private string $group;
    private int $limit = 10;
    private int $offset = 0;
    private array $where = [];
    private array $join = [];
    private array $binds = [];
    private string $limits;
    public static function select(string $fields = '*'): ?self
    {
        $self = new self;
        $self->fields = $fields;
        return $self;
    }
    public function table(string $table): ?self
    {
        $this->table = '';
        $this->table = $table;
        return $this;
    }
    public function where(
        string $field,
        string $operator,
        string|int|bool|float $value,
        ?string $logic = null
    ): ?self {
        $placeHolder = '';
        $placeHolder = $field;
        if (str_contains($placeHolder, '.')) {
            $placeHolder = substr($field, strpos($field, '.') + 1);
        }
        $i = 1;
        while (array_key_exists($placeHolder, $this->binds)) {
            $placeHolder = $placeHolder;
            $i++;
        }
        #Campo formatado com UPPER e cast para texto
        $formattedField = "UPPER({$field}::TEXT)";
        $paramValue = strtoupper((string) $value);
        if (strtoupper($operator) === 'LIKE') {
            $paramValue = "%{$paramValue}%";
        }
        $condition = "{$formattedField} {$operator} :{$placeHolder}";
        $logicSQL = $logic ? strtoupper($logic) : '';
        $this->where[] = "{$condition} {$logicSQL}";
        $this->binds[$placeHolder] = $paramValue;
        return $this;
    }
    public function order(string $field, string $value): ?self
    {
        $this->order = " order by {$field} {$value}";
        return $this;
    }
    public function createQuery()
    {
        if (!$this->fields) {
            throw new \Exception("A query precisa chamar o metodo select");
        }
        if (!$this->table) {
            throw new \Exception("A query precisa chamar o metodo from");
        }
        $query = '';
        $query = 'select ';
        $query .= $this->fields . ' from ';
        $query .= $this->table;
        $query .= (isset($this->join) and (count($this->join) > 0)) ? implode(
            ' ',
            $this->join
        ) : '';
        $query .= (isset($this->where) and (count($this->where) > 0)) ? ' where ' .
            implode(' ', $this->where) : '';
        $query .= $this->group ?? '';
        $query .= $this->order ?? '';
        $query .= $this->limits ?? '';
        return $query;
    }
    public function join(string $foreingTable, string $logic, string $type = 'inner'): ?self
    {
        $this->join[] = " {$type} join {$foreingTable} on {$logic}";
        return $this;
    }
    public function group(string $field): ?self
    {
        $this->group = " group by {$field}";
        return $this;
    }
    public function limit(int $limit, int $offset): ?self
    {
        $this->limit = $limit;
        $this->offset = $offset;
        $this->limits = " limit {$this->limit} offset {$this->offset}";
        return $this;
    }
    public function between(string $field, string|int $value1, string|int $value2): ?self
    {
        $placeHolder1 = $field . '_1';
        $placeHolder2 = $field . '_2';
        $this->where[] = "{$field} between :{$placeHolder1} and :{$placeHolder2}";
        $this->binds[$placeHolder1] = $value1;
        $this->binds[$placeHolder2] = $value2;
        return $this;
    }
    public function fetch()
    {
        $query = '';
        $query = $this->createQuery();
        try {
            $connection = Connection::connect();
            $prepare = $connection->prepare($query);
            $prepare->execute($this->binds ?? []);
            return $prepare->fetchObject();
        } catch (\PDOException $e) {
            throw new \Exception("Restrição: {$e->getMessage()}");
        }
    }
    public function fetchAll()
    {
        $query = $this->createQuery();
        try {
            $connection = Connection::connect();
            $prepare = $connection->prepare($query);
            $prepare->execute($this->binds ?? []);
            $data = $prepare->fetchAll();
            return $data;
        } catch (\PDOException $e) {
            throw new \Exception("Restrição: {$e->getMessage()}");
        }
    }
}