<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateRequests extends AbstractMigration
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
        $table = $this->table('requests');
        $table->addColumn('first_name', 'string', [
            'limit' => 50,
            'null' => false,

        ])
            ->addColumn('last_name', 'string', [
                'limit' => 50,
                'null' => false
            ])
            ->addColumn('mail_address', 'string', [
                'limit' => 50,
                'null' => false
            ])
            ->addColumn('phone_number', 'string', [
                'limit' => 50,
                'null' => false
            ])
            ->addColumn('departure_date', 'date', [
                'null' => false
            ])
            ->addColumn('departure_time', 'time', [
                'null' => false
            ])
            ->addColumn('created', 'datetime', [
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP'
            ]);
        $table->create();
    }
}
