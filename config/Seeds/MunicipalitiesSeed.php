<?php
use Migrations\AbstractSeed;

/**
 * Municipalities seed.
 */
class MunicipalitiesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
      $datetime = date("Y-m-d H:i:s");
      $data = [
        [
          "name" => "山口市",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "name" => "宇部市",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "name" => "防府市",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "name" => "光市",
          "created" => $datetime,
          "modified" => $datetime
        ]
      ];

        $table = $this->table('municipalities');
        $table->insert($data)->save();
    }
}
