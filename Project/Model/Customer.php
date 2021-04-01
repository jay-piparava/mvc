<?php
namespace Model;

/**
 *
 */
class Customer extends Core\Table
{
    const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;
    protected $billing = null;
    protected $shipping = null;

    public function __construct()
    {
        $this->setTablename('customer');
        $this->setPrimaryKey('customerId');
    }
    public function getStatusOptions()
    {
        return [
            self::STATUS_DESABLED => "Disable", //or use self::
            self::STATUS_ENABLE => "Enable",
        ];
    }
    public function setBillingAddress()
    {
        $address = \Mage::getModel('Model\Customer\Address');
        $query = "SELECT * FROM `{$address->getTableName()}` WHERE `customerId` = '{$this->customerId}' AND `addressType` = 'billing'";
        $address = $address->load(null, $query);
        $this->shipping = $address;
        return $this;
    }

    public function getBillingAddress()
    {
        if (!$this->shipping) {
            $this->setBillingAddress();
        }
        return $this->shipping;
    }

    public function setShippingAddress()
    {
        $address = \Mage::getModel('Model\Customer\Address');
        $query = "SELECT * FROM `{$address->getTableName()}` WHERE `customerId` = '{$this->customerId}' AND `addressType` = 'shipping'";
        $address = $address->load(null, $query);
        $this->billing = $address;
        return $this;
    }

    public function getShippingAddress()
    {
        if (!$this->billing) {
            $this->setShippingAddress();
        }
        return $this->billing;
    }
}
