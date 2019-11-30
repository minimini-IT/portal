<?php
use Migrations\AbstractMigration;

class CreateReservations extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('reservations', ["id" => false, "primary_key" => ["reservations_id"]]);
        $table->addColumn('reservations_id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 4,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('datetime', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('menus_id', 'integer', [
            'default' => null,
            'limit' => 4,
            'null' => false,
        ]);
        $table->addColumn('tel', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('mail', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();

        $this->table('reservations')
            ->addForeignKey(
                'menus_id',
                'menus',
                'menus_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down(){
      $this->table('reservations')
        ->dropForeignKey(
          'menus_id'
        )->save();

      $this->table('reservations')->drop()->save();
    }

}
