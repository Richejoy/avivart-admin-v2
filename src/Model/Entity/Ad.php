<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ad Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $characteristics
 * @property float $price
 * @property bool $is_vip
 * @property bool $published
 * @property \Cake\I18n\FrozenDate $expire_date
 * @property int $image_id
 * @property int $ad_category_id
 * @property int $ad_type_id
 * @property int $currency_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Image[] $images
 * @property \App\Model\Entity\AdCategory $ad_category
 * @property \App\Model\Entity\AdType $ad_type
 * @property \App\Model\Entity\Currency $currency
 * @property \App\Model\Entity\User[] $users
 */
class Ad extends Entity
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
        'description' => true,
        'characteristics' => true,
        'price' => true,
        'is_vip' => true,
        'published' => true,
        'expire_date' => true,
        'image_id' => true,
        'ad_category_id' => true,
        'ad_type_id' => true,
        'currency_id' => true,
        'user_id' => true,
        'images' => true,
        'ad_category' => true,
        'ad_type' => true,
        'currency' => true,
        'users' => true,
    ];
}
