<?php
namespace Block\Admin\Customer\Edit\Tabs;

/**
 *
 */
class Address extends \Block\Core\Edit
{
    protected $shipping;
    protected $billing;

    public function __construct()
    {
        $this->setTemplate('Admin/customer/Edit/Tabs/address.php');
    }

    protected function setBilling($billing = null)
    {
        if ($this->billing) {
            $this->billing = $billing;
        }
        $billing = \Mage::getModel('Model\Customer\Address');
        if ($id = $this->getTableRow()->customerId) {
            $query = "SELECT * FROM `address` WHERE `customerId` = $id AND type = 'billing'";
            $row = $billing->load(null, $query);
            $this->billing = $row;
        }
        $this->billing = $billing;
        return $this;
    }
    public function getBilling()
    {
        if (!$this->billing) {
            $this->setBilling();
        }
        return $this->billing;
    }

    protected function setShipping($shipping = null)
    {
        if ($this->shipping) {
            $this->shipping = $shipping;
        }
        $shipping = \Mage::getModel('Model\Customer\Address');
        if ($id = $this->getRequest()->getGet('id')) {
            $query = "SELECT * FROM `address` WHERE `customerId` = $id AND type = 'shipping'";
            $row = $shipping->load(null, $query);
            $this->shipping = $row;
        }
        $this->shipping = $shipping;
        return $this;
    }
    public function getShipping()
    {
        if (!$this->shipping) {
            $this->setShipping();
        }
        return $this->shipping;
    }

}
