<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $mail_address
 * @property string $phone_number
 * @property \Cake\I18n\Date $departure_date
 * @property \Cake\I18n\Time $departure_time
 * @property \Cake\I18n\DateTime $created
 */
class Request extends Entity
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
        'last_name' => true,
        'mail_address' => true,
        'phone_number' => true,
        'departure_date' => true,
        'departure_time' => true,
        'created' => true,
    ];
}
