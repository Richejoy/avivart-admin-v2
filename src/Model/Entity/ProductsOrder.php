<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductsOrder Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property float $quantity
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Order $order
 */
class ProductsOrder extends Entity
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
        'quantity' => true,
        'product' => true,
        'order' => true,
    ];
}
