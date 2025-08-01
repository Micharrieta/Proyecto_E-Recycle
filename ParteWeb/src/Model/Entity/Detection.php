<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Detection Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $location_id
 * @property \Cake\I18n\DateTime $detection_time
 * @property string|null $detected_object
 * @property string|null $name
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Location $location
 */
class Detection extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'user_id' => true,
        'location_id' => true,
        'detection_time' => true,
        'detected_object' => true,
        'name' => true,
        'user' => true,
        'location' => true,
    ];
}
