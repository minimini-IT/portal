<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SalonInformation Entity
 *
 * @property int $salon_informations_id
 * @property string $name
 * @property int $municipalities_id
 * @property string $tel
 * @property string $business_hour
 * @property string $street_address
 * @property string $regular_holiday
 * @property int $number_of_staff
 * @property int $number_of_seat
 * @property int $number_of_parking
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Municipality $municipality
 */
class SalonInformation extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'municipalities_id' => true,
        'tel' => true,
        'business_hour' => true,
        'street_address' => true,
        'regular_holiday' => true,
        'number_of_staff' => true,
        'number_of_seat' => true,
        'number_of_parking' => true,
        'created' => true,
        'modified' => true,
        'municipality' => true
    ];
}
