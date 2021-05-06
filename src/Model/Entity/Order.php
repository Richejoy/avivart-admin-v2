<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string $delivery_address
 * @property \Cake\I18n\FrozenDate $delivery_date
 * @property bool $paid
 * @property int $user_id
 * @property int $payment_mode_id
 * @property int|null $coupon_id
 * @property int $order_state_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\PaymentMode $payment_mode
 * @property \App\Model\Entity\Coupon $coupon
 * @property \App\Model\Entity\OrderState $order_state
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Product[] $products
 */
class Order extends Entity
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
        'delivery_address' => true,
        'delivery_date' => true,
        'paid' => true,
        'user_id' => true,
        'payment_mode_id' => true,
        'coupon_id' => true,
        'order_state_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'payment_mode' => true,
        'coupon' => true,
        'order_state' => true,
        'payments' => true,
        'products' => true,
    ];
}
