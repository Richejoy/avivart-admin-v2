<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdCategory Entity
 *
 * @property int $id
 * @property string $name
 * @property int $image_id
 * @property int $ad_ray_id
 *
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\AdRay $ad_ray
 * @property \App\Model\Entity\Ad[] $ads
 */
class AdCategory extends Entity
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
        'image_id' => true,
        'ad_ray_id' => true,
        'image' => true,
        'ad_ray' => true,
        'ads' => true,
    ];
}
