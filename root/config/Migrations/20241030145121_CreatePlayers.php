<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePlayers extends AbstractMigration
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
        $table = $this->table('players');
        $table->addColumn('name', 'string', ['limit' => 32, 'default' => 'NewPlayer', 'null' => false])
              ->addColumn('level', 'integer', ['default' => 0, 'null' => false])
              ->addColumn('clan', 'string', ['limit' => 32]);
        $table->create();
    }
}
