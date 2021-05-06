<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 *
 * @property int $id
 * @property string $folder
 * @property string|null $url
 * @property string|null $link
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ProductCategory[] $product_categories
 * @property \App\Model\Entity\ProductRay[] $product_rays
 * @property \App\Model\Entity\ProductType[] $product_types
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\User[] $users
 */
class Image extends Entity
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
        'folder' => true,
        'url' => true,
        'link' => true,
        'created' => true,
        'modified' => true,
        'product_categories' => true,
        'product_rays' => true,
        'product_types' => true,
        'products' => true,
        'users' => true,
    ];
}
