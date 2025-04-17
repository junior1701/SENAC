<?php

# namespace permite que a minha classe seja acessada de qualquer lugar do projeto
namespace App\Database\Builder;

class UpdateQuery 
{
    #Recebe o nome da tabela valores a serem atualizados
    private array $table = [];
    #Recebe os campos para filtro para o WHERE
    private array $where = [];
    #Recebe os valores e campos para filtro para o WHERE
    private array $binds = [];
    #Recebe os nomes dos campos e valores a serem atualizados
    private array $fildsAndValues = [];

    public static function table($table): self
    {
        #cria uma nova instancia da classe 
        $self = new self();
        #Recebe op valor do parametro $table e armazena na variavel $table
        $self->table = $table;
        #retorna a instancia da propria classe
        return $self;
    }
    
    public function set(array $fildsAndValues): self
    {
        #Recebe op valor do parametro $fildsAndValues e armazena na variavel $fildsAndValues
        $this->fildsAndValues = $fildsAndValues;
        #retorna a instancia da propria classe
        return $this;
    }
    
    public function where(string $field, string $operator, string | int $values, $logic = null): self
    {
        $placeholder = '';
        $placeholder = $field;
        if (str_contains($placeholder, '.')) {
            $placeholder = substr($field, strpos($field, '.') + 1);
        }
        $this->where[] = "{$field} {$operator} :{$placeholder} {$logic}";
        $this->binds[$placeholder] = $values;
        #retorna a instancia da propria classe
        return $this;
    }
    public function createQuery(){
        #verificamos se o nome de uma tabela foi informado
        if (!$this->table) {
            #caso nao seja informado, lançamos um erro
            throw new \Exception("Tabela não informada!");
        }
        #verificamos se o nome de uma tabela foi informado
        if (!$this->fildsAndValues) {
            #caso nao seja informado, lançamos um erro
            throw new \Exception("Valores não informados!");
        }
        $query = '';
        $query = "UPDATE {$this->table} SET ";
        foreach ($this->fildsAndValues as $fields => $value) {
            $query .= "{$fields} = :{$fields}, ";
            $this->binds[$fields] = $value;
        }
        #Remove a ultima vírgula da string
        $query = rtrim($query, ', ');
        $query .= (isset($this->where) && count($this->where) > 0) ? 
        ' where ' . implode(' ', $this->where) : '';
        return $query;
    }
    public function executeQuery($conn): bool
    {
        $connection = connection::connect();
        $prepare = $connection->prepare($query);
        return $prepare->execute($this->binds ?? []);
    }

    public function update ()
    {
        $query = $this->createQuery();
        try{
            return $this->executeQuery($query);
        }catch (\Exception $e) {
            throw new \Exception("Erro: " . $e->getMessage(), 1);
        }
    }

    
}
