<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CorporateClient Entity
 *
 * @property int $id
 * @property string $name
 * @property string $sales
 * @property string $purchase
 * @property string $cart
 * @property string $wishlist
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class CorporateClient extends Entity
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
        'sales' => true,
        'purchase' => true,
        'cart' => true,
        'wishlist' => true,
        'created' => true,
        'modified' => true,
    ];
}
