<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdFormula Entity
 *
 * @property int $id
 * @property int $ad_id
 * @property int $formula_id
 * @property bool $paid
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Ad $ad
 * @property \App\Model\Entity\Formula $formula
 */
class AdFormula extends Entity
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
        'ad_id' => true,
        'formula_id' => true,
        'paid' => true,
        'created' => true,
        'modified' => true,
        'ad' => true,
        'formula' => true,
    ];
}
