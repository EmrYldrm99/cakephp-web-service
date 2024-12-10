<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePairs extends AbstractMigration
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
        $table = $this->table('pairs');
        $table->addColumn('first_name', 'string', [
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('player_id', 'integer', [
            'null' => true, // Optional, falls es auch Requests ohne zugewiesenen Fahrer geben soll
        ])
            ->addForeignKey('player_id', 'players', 'id', [
                'delete' => 'SET_NULL', // Wenn der zugehörige Fahrer gelöscht wird, setze die driver_id auf NULL
                'update' => 'CASCADE',  // Wenn die ID des Fahrers geändert wird, ändere auch den Fremdschlüssel
            ]);
        $table->addColumn('user_id', 'integer', [
            'null' => true, // Optional, falls es auch Requests ohne zugewiesenen Fahrer geben soll
        ])
            ->addForeignKey('user_id', 'users', 'id', [
                'delete' => 'SET_NULL', // Wenn der zugehörige Fahrer gelöscht wird, setze die driver_id auf NULL
                'update' => 'CASCADE',  // Wenn die ID des Fahrers geändert wird, ändere auch den Fremdschlüssel
            ]);
        $table->create();
    }
}
