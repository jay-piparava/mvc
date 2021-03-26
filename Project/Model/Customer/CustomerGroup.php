<?php
namespace Model\Customer;

/**
 *
 */
class CustomerGroup extends \Model\Core\Table
{

    const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;
    public function __construct()
    {
        $this->setTablename('customer_group');
        $this->setPrimaryKey('groupId');
    }
    public function getStatusOptions()
    {
        return [
            self::STATUS_DESABLED => "Disable",
            self::STATUS_ENABLE => "Enable",
        ];
    }
}
