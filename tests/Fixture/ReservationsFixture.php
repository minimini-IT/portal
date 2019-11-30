<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReservationsFixture
 */
class ReservationsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'reservations_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'menus_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tel' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mail' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'reservation_datetimes_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'menus_id' => ['type' => 'index', 'columns' => ['menus_id'], 'length' => []],
            'reservation_datetimes_id' => ['type' => 'index', 'columns' => ['reservation_datetimes_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['reservations_id'], 'length' => []],
            'reservations_ibfk_1' => ['type' => 'foreign', 'columns' => ['menus_id'], 'references' => ['menus', 'menus_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'reservations_ibfk_2' => ['type' => 'foreign', 'columns' => ['reservation_datetimes_id'], 'references' => ['reservation_datetimes', 'reservation_datetimes_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'reservations_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'menus_id' => 1,
                'tel' => 'Lorem ipsum dolor sit amet',
                'mail' => 'Lorem ipsum dolor sit amet',
                'created' => '2019-11-01 17:17:41',
                'modified' => '2019-11-01 17:17:41',
                'reservation_datetimes_id' => 1
            ],
        ];
        parent::init();
    }
}
