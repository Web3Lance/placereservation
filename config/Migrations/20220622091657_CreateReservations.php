<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateReservations extends AbstractMigration
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
        $table = $this->table('reservations', ['id' => false, 'primary_key' => ['id']]);
        $table->addColumn('id', 'integer', [
            'autoIncrement' => true,
            'limit' => 5
        ]);
        $table->addColumn('start_date', 'date', [
            'limit' => 120,
            'null' => false,
        ]);
        $table->addColumn('end_date', 'date', [
            'limit' => 120,
            'null' => false,
        ]);
        $table->addColumn('created_at', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ]);
        $table->addPrimaryKey("id");
        $table->create();
    }
}
