<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $characteristics
 * @property float $old_price
 * @property float $new_price
 * @property float $quantity
 * @property bool $on_discount
 * @property bool $published
 * @property int $image_id
 * @property int $product_category_id
 * @property int $product_type_id
 * @property int $currency_id
 * @property int $conversion_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\ProductCategory $product_category
 * @property \App\Model\Entity\ProductType $product_type
 * @property \App\Model\Entity\Currency $currency
 * @property \App\Model\Entity\Conversion $conversion
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Order[] $orders
 */
class Product extends Entity
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
        'old_price' => true,
        'new_price' => true,
        'quantity' => true,
        'on_discount' => true,
        'published' => true,
        'image_id' => true,
        'product_category_id' => true,
        'product_type_id' => true,
        'currency_id' => true,
        'conversion_id' => true,
        'user_id' => true,
        'image' => true,
        'product_category' => true,
        'product_type' => true,
        'currency' => true,
        'conversion' => true,
        'users' => true,
        'orders' => true,
    ];
}
