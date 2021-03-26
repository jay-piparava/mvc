<?php
namespace Block\Admin\Customer\Edit\Tabs;

/**
 *
 */
class Form extends \Block\Core\Edit
{
    protected $customerGroup;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('Admin/Customer/Edit/tabs/form.php');
    }

    protected function setCustomerGroup($customerGroup = null)
    {
        if ($this->customerGroup) {
            $this->customerGroup = $customerGroup;
        }
        $customerGroup = \Mage::getModel('Model\Customer\CustomerGroup');
        $row = $customerGroup->all();
        $this->customerGroup = $row;
        return $this;
    }
    public function getcustomerGroup()
    {
        if (!$this->customerGroup) {
            $this->setCustomerGroup();
        }
        return $this->customerGroup;
    }
}
