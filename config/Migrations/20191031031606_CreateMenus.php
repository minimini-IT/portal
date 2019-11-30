<?php
use Migrations\AbstractMigration;

class CreateMenus extends AbstractMigration
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
        $table = $this->table('menus', ["id" => false, "primary_key" => ["menus_id"]]);
        $table->addColumn('menus_id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 4,
            'null' => false,
        ]);
        $table->addColumn('menu', 'string', [
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
    }

    public function down(){
      $this->table('menus')->drop()->save();
    }
}
