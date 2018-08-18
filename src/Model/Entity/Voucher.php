<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Voucher Entity
 *
 * @property int $id
 * @property int $recipient_id
 * @property int $special_offer_id
 * @property string $code
 * @property \Cake\I18n\FrozenTime $expiration_date
 * @property string $used
 * @property \Cake\I18n\FrozenTime $date_usage
 *
 * @property \App\Model\Entity\Recipient $recipient
 * @property \App\Model\Entity\SpecialOffer $special_offer
 */
class Voucher extends Entity
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
        'recipient_id' => true,
        'special_offer_id' => true,
        'code' => true,
        'expiration_date' => true,
        'used' => true,
        'date_usage' => true,
        'recipient' => true,
        'special_offer' => true
    ];
}
