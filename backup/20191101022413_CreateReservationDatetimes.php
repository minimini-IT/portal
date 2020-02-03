<?php
use Migrations\AbstractMigration;

class CreateReservationDatetimes extends AbstractMigration
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
        $table = $this->table('reservation_datetimes', ["id" => false, "primary_key" => ["reservation_datetimes_id"]]);
        $table->addColumn('reservation_datetimes_id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('reservations_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('reservation_datetime', 'datetime', [
            'default' => null,
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

        $table->addForeignKey(
              'reservations_id',
              'reservations',
              'reservations_id',
              [
                  'update' => 'CASCADE',
                  'delete' => 'CASCADE'
              ]
          );
        $table->update();
    }

    public function down(){
        $this->table('reservation_datetimes')
          ->dropForeignKey(
            'reservations_id'
          )->save();

        $this->table('reservation_datetimes')->drop()->save();
    }
}
