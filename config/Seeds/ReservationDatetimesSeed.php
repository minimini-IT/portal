<?php
use Migrations\AbstractSeed;

/**
 * ReservationDatetimes seed.
 */
class ReservationDatetimesSeed extends AbstractSeed
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
            "reservations_id" => 1,
            "reservation_datetime" => date("Y-m-d H:i:s", strtotime("+1 day 10:00:00")),
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "reservations_id" => 2,
            "reservation_datetime" => date("Y-m-d H:i:s", strtotime("+2 day 12:30:00")),
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "reservations_id" => 3,
            "reservation_datetime" => date("Y-m-d H:i:s", strtotime("+3 day 14:30:00")),
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "reservations_id" => 4,
            "reservation_datetime" => date("Y-m-d H:i:s", strtotime("+5 day 19:00:00")),
            "created" => $datetime,
            "modified" => $datetime
          ]
        ];

        $table = $this->table('reservation_datetimes');
        $table->insert($data)->save();
    }
}
