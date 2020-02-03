<?php
use Migrations\AbstractSeed;

/**
 * SearchTimes seed.
 */
class SearchTimesSeed extends AbstractSeed
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
          "time" => "8:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "8:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "9:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "9:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "10:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "10:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "11:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "11:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "12:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "12:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "13:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "13:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "14:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "14:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "15:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "15:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "16:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "16:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "17:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "17:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "18:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "18:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "19:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "19:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "20:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "20:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "21:00",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "21:30",
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "time" => "22:00",
          "created" => $datetime,
          "modified" => $datetime
        ]
      ];

        $table = $this->table('search_times');
        $table->insert($data)->save();
    }
}
