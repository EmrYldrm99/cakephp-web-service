<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AddDriverColumnToRequests extends AbstractMigration
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
        $table->addColumn('driver_id', 'integer', [
            'null' => true, // Optional, falls es auch Requests ohne zugewiesenen Fahrer geben soll
        ])
            ->addForeignKey('driver_id', 'drivers', 'id', [
                'delete' => 'SET_NULL', // Wenn der zugehörige Fahrer gelöscht wird, setze die driver_id auf NULL
                'update' => 'CASCADE',  // Wenn die ID des Fahrers geändert wird, ändere auch den Fremdschlüssel
            ])
            ->update();
    }
}
