<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTableDrivers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('drivers');
        $table->addColumn('first_name', 'string', [
            'limit' => 50,
            'null' => false,
        ])
            ->addColumn('last_name', 'string', [
                'limit' => 50,
                'null' => false
            ]);
        $table->create();
    }
}
