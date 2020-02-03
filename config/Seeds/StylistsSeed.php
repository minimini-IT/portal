<?php
use Migrations\AbstractSeed;

/**
 * Stylists seed.
 */
class StylistsSeed extends AbstractSeed
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
            "name" => "田中 健二",
            "start_stylist" => "19920401",
            "birthday" => "19720720",
            "comment" => "美容師test1",
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 2,
            "name" => "山本 真一",
            "start_stylist" => "19930401",
            "birthday" => "19730720",
            "comment" => "美容師test2",
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 2,
            "name" => "山本 律子",
            "start_stylist" => "19930401",
            "birthday" => "19730610",
            "comment" => "美容師test2",
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 3,
            "name" => "星野 淳",
            "start_stylist" => "20000401",
            "birthday" => "19801203",
            "comment" => "美容師test3",
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 3,
            "name" => "高橋 優奈",
            "start_stylist" => "20000401",
            "birthday" => "19801107",
            "comment" => "美容師test3",
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 3,
            "name" => "高木 祐一",
            "start_stylist" => "20000401",
            "birthday" => "19800724",
            "comment" => "美容師test3",
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 3,
            "name" => "三井 優作",
            "start_stylist" => "19900401",
            "birthday" => "19700106",
            "comment" => "美容師test3",
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 4,
            "name" => "太田 雄二",
            "start_stylist" => "19900401",
            "birthday" => "19700106",
            "comment" => "美容師test4",
            "created" => $datetime,
            "modified" => $datetime
          ]
        ];

        $table = $this->table('stylists');
        $table->insert($data)->save();
    }
}
