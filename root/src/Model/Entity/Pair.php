<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pair Entity
 *
 * @property int $id
 * @property string $first_name
 * @property int|null $player_id
 * @property int|null $user_id
 *
 * @property \App\Model\Entity\Player $player
 * @property \App\Model\Entity\User $user
 */
class Pair extends Entity
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
        'first_name' => true,
        'player_id' => true,
        'user_id' => true,
        'player' => true,
        'user' => true,
    ];
}
