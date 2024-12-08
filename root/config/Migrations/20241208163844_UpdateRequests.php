<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class UpdateRequests extends AbstractMigration
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
        $this->table('requests')
            ->addColumn('status', 'enum', [
                'values' => ['pending', 'accepted', 'rejected'],
                'default' => 'pending',
                'null' => false
            ])
            ->update();
    }
}
