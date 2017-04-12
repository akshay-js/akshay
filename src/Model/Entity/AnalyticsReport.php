<?php
namespace Akshay\Model\Entity;

use Cake\ORM\Entity;

/**
 * AnalyticsReport Entity
 *
 * @property int $id
 * @property string $load_time
 * @property string $curr_url
 * @property string $page_title
 * @property string $height
 * @property string $width
 * @property string $location
 */
class AnalyticsReport extends Entity
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
        '*' => true,
        'id' => false
    ];
}
