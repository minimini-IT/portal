<?php
use Migrations\AbstractSeed;

/**
 * SalonInformations seed.
 */
class SalonInformationsSeed extends AbstractSeed
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
          "name" => "salon-A",
          "municipalities_id" => "1",
          "tel" => 00011112222,
          "business_hour" => "0900-2000",
          "street_address" => "山口市〇〇",
          "regular_holiday" => "月曜日 第２・４火曜日",
          "number_of_staff" => 1,
          "number_of_seat" => 1,
          "number_of_parking" => 2,
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "name" => "salon-B",
          "municipalities_id" => "2",
          "tel" => 00011113333,
          "business_hour" => "0900-2000",
          "street_address" => "山口市✖︎✖︎",
          "regular_holiday" => "月曜日 第２火曜日 第３日曜日",
          "number_of_staff" => 2,
          "number_of_seat" => 2,
          "number_of_parking" => 3,
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "name" => "salon-C",
          "municipalities_id" => "3",
          "tel" => 00011114444,
          "business_hour" => "1000-2030",
          "street_address" => "山口市▽▽",
          "regular_holiday" => "月曜日",
          "number_of_staff" => 5,
          "number_of_seat" => 3,
          "number_of_parking" => 5,
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "name" => "salon-D",
          "municipalities_id" => "4",
          "tel" => 00022224444,
          "business_hour" => "0900-1930",
          "street_address" => "山口市□",
          "regular_holiday" => "火曜日 第２月曜日",
          "number_of_staff" => 2,
          "number_of_seat" => 2,
          "number_of_parking" => 3,
          "created" => $datetime,
          "modified" => $datetime
        ]
      ];

        $table = $this->table('salon_informations');
        $table->insert($data)->save();
    }
}
