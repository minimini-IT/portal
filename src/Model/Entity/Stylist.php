<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stylist Entity
 *
 * @property int $stylists_id
 * @property int $salon_informations_id
 * @property string $name
 * @property \Cake\I18n\FrozenDate $start_stylist
 * @property \Cake\I18n\FrozenDate $birthday
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\SalonInformation $salon_information
 */
class Stylist extends Entity
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
        'salon_informations_id' => true,
        'name' => true,
        'start_stylist' => true,
        'birthday' => true,
        'comment' => true,
        'created' => true,
        'modified' => true,
        'salon_information' => true
    ];
}
