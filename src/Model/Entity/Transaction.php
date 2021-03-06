<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property string $activity
 * @property \Cake\I18n\FrozenTime $created
 * @property int $transaction_type_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\TransactionType $transaction_type
 * @property \App\Model\Entity\User $user
 */
class Transaction extends Entity
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
        'activity' => true,
        'created' => true,
        'transaction_type_id' => true,
        'user_id' => true,
        'transaction_type' => true,
        'user' => true,
    ];
}
