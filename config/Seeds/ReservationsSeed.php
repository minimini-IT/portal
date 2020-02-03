<?php
use Migrations\AbstractSeed;

/**
 * Reservations seed.
 */
class ReservationsSeed extends AbstractSeed
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
          "salon_informations_id" => 1,
          "name" => "松尾忠",
          "menus_id" => 1,
          "mail" => "hogehoge@huga.com",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "salon_informations_id" => 2,
          "name" => "中野裕也",
          "menus_id" => 5,
          "mail" => "hugahuga@hoge.com",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "salon_informations_id" => 3,
          "name" => "太田健",
          "menus_id" => 9,
          "mail" => "hugahoge@hogu.com",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "salon_informations_id" => 4,
          "name" => "中村武志",
          "menus_id" => 10,
          "mail" => "hogehuga@huge.com",
          "created" => $datetime,
          "modified" => $datetime
        ]
      ];

        $table = $this->table('reservations');
        $table->insert($data)->save();
    }
}
