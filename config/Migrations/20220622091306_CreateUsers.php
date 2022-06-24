<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
    
        $table = $this->table('users', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'integer', [
            'autoIncrement' => true,
            'limit' => 5
        ]);
        $table->addColumn('lastname', 'string', [
            'limit' => 120,
            'null' => false,
        ]);
        $table->addColumn('firstname', 'string', [
            'limit' => 120,
            'null' => false,
        ]);
        $table->addColumn('birthdate', 'string', [
            'limit' => 120,
            'null' => false,
        ]);
        $table->addColumn('email', 'string', [
            'limit' => 120,
            'null' => false,
        ]);
        $table->addColumn('phone', 'string', [
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('reservation_id', 'integer');
       
        $table->addColumn('created_at', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ]);
        
        $table->addPrimaryKey("id");
        $table->create();
    }
}
