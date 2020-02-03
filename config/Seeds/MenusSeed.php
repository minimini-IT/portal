<?php
use Migrations\AbstractSeed;

/**
 * Menus seed.
 */
class MenusSeed extends AbstractSeed
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
            "menu" => "カット",
            "time" => 1,
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 1,
            "menu" => "パーマ",
            "time" => 2,
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 1,
            "menu" => "カラー",
            "time" => 3,
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 2,
            "menu" => "スーパーカット",
            "time" => 1,
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 2,
            "menu" => "スーパーパーマ",
            "time" => 2,
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 2,
            "menu" => "スーパーカラー",
            "time" => 3,
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 3,
            "menu" => "ウルトラカット",
            "time" => 1,
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 3,
            "menu" => "ウルトラパーマ",
            "time" => 2,
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 3,
            "menu" => "ウルトラカラー",
            "time" => 3,
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 4,
            "menu" => "普通のカット",
            "time" => 1,
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 4,
            "menu" => "普通のパーマ",
            "time" => 2,
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "salon_informations_id" => 4,
            "menu" => "普通のカラー",
            "time" => 3,
            "created" => $datetime,
            "modified" => $datetime
          ],
        ];

        $table = $this->table('menus');
        $table->insert($data)->save();
    }
}
