<?php
use Migrations\AbstractMigration;

class ChangeReservationDatetimes extends AbstractMigration
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
      $table = $this->table('reservation_datetimes');

      $table->addColumn('menus_id', 'integer', [
          'default' => null,
          'limit' => 4,
          'null' => true,
      ]);

      $table->addIndex([
            'menus_id',
        ]);

      $table->update();

      $this->table('reservation_datetimes')
          ->addForeignKey(
              'menus_id',
              'menus',
              'menus_id',
              [
                  'update' => 'RESTRICT',
                  'delete' => 'RESTRICT'
              ]
          )
//          ->update();
          ->save();
    }

    public function down(){
      $this->table('reservation_datetimes')
        ->dropForeignKey(
          'menus_id'
        )->save();

      $this->table('reservation_datetimes')->removeColumn("menus_id")->save();
    }

}
