<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Usuario extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('usuario', ['id' => false, 'primary_key' => ['id']]);
        $table->addColumn('id', 'biginteger', ['identity' => true, 'null' => false])
            ->addColumn('nome', 'text', ['null' => true])
            ->addColumn('cpf', 'text', ['null' => true])
            ->addColumn('rg', 'text', ['null' => true])
            ->addColumn('senha', 'text', ['null' => true])
            ->addColumn('data_cadastro', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('data_atualizacao', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
