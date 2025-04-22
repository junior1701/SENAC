<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Fornecedor extends AbstractMigration
{

    public function change(): void
    {
        $table = $this->table('fornecedor', ['id' => false, 'primary_key' => ['id']]);
        $table->addColumn('id', 'biginteger', ['identity' => true, 'null' => false])
            ->addColumn('nome', 'text', ['null' => true])
            ->addColumn('cnpj', 'text', ['null' => true])
            ->addColumn('ie', 'text', ['null' => true])
            ->addColumn('data_cadastro', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('data_atualizacao', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
