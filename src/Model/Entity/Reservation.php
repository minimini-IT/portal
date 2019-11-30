<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $reservations_id
 * @property string $name
 * @property int $menus_id
 * @property string $tel
 * @property string $mail
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $reservation_datetimes_id
 *
 * @property \App\Model\Entity\Menu $menu
 */
class Reservation extends Entity
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
        'menus_id' => true,
        'tel' => true,
        'mail' => true,
        'created' => true,
        'modified' => true,
        'reservation_datetimes_id' => true,
        'menu' => true
    ];
}
