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
        $table = $this->table('reservation_datetimes', ["id" => false, "primary_key" =>["reservation_datetimes_id"]]);
        $table->addColumn('reservation_datetimes_id', 'integer', [
            'autoIncrement' => true,
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

        $table = $this->table('reservations');
        $table->removeColumn("datetime");
        
        $table->addColumn('reservation_datetimes_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
          ]);
        $table->addIndex([
              'reservation_datetimes_id',
          ]);
        $table->addForeignKey(
              'reservation_datetimes_id',
              'reservation_datetimes',
              'reservation_datetimes_id',
              [
                  'update' => 'RESTRICT',
                  'delete' => 'RESTRICT'
              ]
          );
        $table->update();
    }

    public function down(){
        $this->table('reservation_datetimes')->drop()->save();
        $this->table('reservation')
            ->dropForeignKey(
                'reservations_datetimes_id'
            )
            ->removeColumn("reservation_datetimes_id")
            ->addColumn("datetime")
            ->save();
    }
}
