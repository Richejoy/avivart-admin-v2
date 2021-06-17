<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $username
 * @property string|null $password
 * @property bool $activated
 * @property bool $can_login
 * @property \Cake\I18n\FrozenTime|null $last_login
 * @property int $nb_login
 * @property string|null $city
 * @property string|null $address
 * @property string|null $token
 * @property string|null $remember_token
 * @property bool $tfa_enabled
 * @property string|null $tfa_code
 * @property bool $removed
 * @property int $image_id
 * @property int $country_id
 * @property int $civility_id
 * @property int $user_type_id
 * @property int $role_id
 *
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Civility $civility
 * @property \App\Model\Entity\UserType $user_type
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Admin[] $admins
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class User extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'phone' => true,
        'username' => true,
        'password' => true,
        'activated' => true,
        'can_login' => true,
        'last_login' => true,
        'nb_login' => true,
        'city' => true,
        'address' => true,
        'token' => true,
        'remember_token' => true,
        'tfa_enabled' => true,
        'tfa_code' => true,
        'removed' => true,
        'image_id' => true,
        'country_id' => true,
        'civility_id' => true,
        'user_type_id' => true,
        'role_id' => true,
        'image' => true,
        'country' => true,
        'civility' => true,
        'user_type' => true,
        'role' => true,
        'admins' => true,
        'orders' => true,
        'products' => true,
        'transactions' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token',
    ];

    protected function _setLastName($last_name)
    {
        return mb_strtoupper($last_name);
    }

    protected function _setEmail($email)
    {
        return mb_strtolower($email);
    }

    protected function _setPhone($phone)
    {
        return str_replace(' ', '', $phone);
    }

    protected function _setUsername($username)
    {
        return mb_strtoupper($username);
    }

    protected function _setCity($city)
    {
        return ucwords($city);
    }

    protected function _setAddress($address)
    {
        return ucwords($address);
    }

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

    protected function _getFullName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function longPhone()
    {
        return '+' . $this->country->phonecode . $this->phone;
    }
}
