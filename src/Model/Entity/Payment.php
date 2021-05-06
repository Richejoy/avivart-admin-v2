<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property string $tx_reference
 * @property \Cake\I18n\FrozenTime $tx_datetime
 * @property string $payment_reference
 * @property string $payment_method
 * @property string $phone_number
 * @property float $amount
 * @property string $identifier
 * @property string $description
 * @property int $order_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Order $order
 */
class Payment extends Entity
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
        'tx_reference' => true,
        'tx_datetime' => true,
        'payment_reference' => true,
        'payment_method' => true,
        'phone_number' => true,
        'amount' => true,
        'identifier' => true,
        'description' => true,
        'order_id' => true,
        'created' => true,
        'order' => true,
    ];
}
