<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ArticlesOrder Entity
 *
 * @property int $id
 * @property int $article_id
 * @property int $order_id
 * @property float $quantity
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Article $article
 * @property \App\Model\Entity\Order $order
 */
class ArticlesOrder extends Entity
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
        'created' => true,
        'modified' => true,
        'article' => true,
        'order' => true,
    ];
}
