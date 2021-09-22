<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
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
 * @property int $article_category_id
 * @property int $article_type_id
 * @property int $currency_id
 * @property int $conversion_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\ArticleCategory $article_category
 * @property \App\Model\Entity\ArticleType $article_type
 * @property \App\Model\Entity\Currency $currency
 * @property \App\Model\Entity\Conversion $conversion
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Order[] $orders
 */
class Article extends Entity
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
        'article_category_id' => true,
        'article_type_id' => true,
        'currency_id' => true,
        'conversion_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'image' => true,
        'article_category' => true,
        'article_type' => true,
        'currency' => true,
        'conversion' => true,
        'users' => true,
        'orders' => true,
    ];
}
