<?php

namespace app\database\builder;

class DeleteQuery
{
    private static $tabela;
    private $where = [];
    private $binds = [];
    public static function table(string $table): self
    {
        $self = new self;
        $self->tabela = $table;
        return $self;
    }
    public function where(string $field, string $operator, string|int $value, ?string $logic = null): self
    {
        $placeHolder = '';
        $placeHolder = $field;
        if (str_contains($placeHolder, '.')) {
            $placeHolder = substr($field, strpos($field, '.') + 1);
        }
        $this->where[] = "{$field} {$operator} :{$placeHolder} {$logic}";
        $this->binds[$placeHolder] = $value;
        return $this;
    }
    public function delete(): bool
    {
        return true;
    }
}
