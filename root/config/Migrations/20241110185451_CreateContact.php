<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateContact extends AbstractMigration
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
        $table = $this->table('contact');
        $table->addColumn('user_id', 'integer');
        $table->addColumn('mail', 'string', [
            "default" => "test@test.com",
            "null" => false,
            "limit" => 64
        ]);
        $table->addColumn('phone', 'string', [
            "default" => "1231242",
            "null" => false,
            "limit" => 64
        ]);
        $table->addColumn('city', 'string', [
            "default" => "TestCity",
            "null" => false,
            "limit" => 64
        ]);
        $table->addForeignKey('user_id', 'users', 'id', [
            'delete' => 'CASCADE',
            'update' => 'CASCADE'
        ]);
        $table->create();
    }
}
