<?php
use Migrations\AbstractMigration;

class ChangeMenus extends AbstractMigration
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
      $table = $this->table('menus');
      $table->addColumn('menu_time', 'integer', [
          'default' => null,
          'limit' => 4,
          'null' => false,
      ]);

      /*
      $table->addIndex([
            'menus_id',
        ]);
       */

      $table->update();
    }

    public function down(){
      /*
      $this->table('menus')
        ->dropIndex(
          'menus_id'
        )->save();
       */

      $this->table('menus')->removeColumn("menu_time")->save();
    }
}
