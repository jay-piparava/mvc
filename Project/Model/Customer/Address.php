<?php
namespace Model\Customer;

\Mage::loadFileByClassName('Model\Core\Table');
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
