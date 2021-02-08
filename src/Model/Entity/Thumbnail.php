<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Thumbnail Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $file_name
 * @property string|null $mime_type
 * @property string|null $extension
 * @property int|null $size
 * @property string|null $path
 * @property string|null $url
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Product[] $products
 */
class Thumbnail extends Entity
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
        'file_name' => true,
        'mime_type' => true,
        'extension' => true,
        'size' => true,
        'path' => true,
        'url' => true,
        'created' => true,
        'modified' => true,
        'products' => true,
    ];
}
