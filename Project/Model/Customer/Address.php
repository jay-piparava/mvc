<?php
namespace Model\Customer;

/**
 *
 */
class Address extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setTablename('address');
        $this->setPrimaryKey('addressId');
    }
    public function getShippingOptions()
    {
        return [
            'shipping' => "Shipping",
            'billing' => "Billing",
        ];
    }
}
