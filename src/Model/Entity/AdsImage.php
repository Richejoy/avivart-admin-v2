<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdsImage Entity
 *
 * @property int $id
 * @property int $image_id
 * @property int $ad_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\Ad $ad
 */
class AdsImage extends Entity
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
        'id' => true,
        'created' => true,
        'image' => true,
        'ad' => true,
    ];
}
