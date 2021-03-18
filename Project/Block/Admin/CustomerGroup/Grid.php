<?php
namespace Block\Admin\CustomerGroup;

\Mage::loadFileByClassName('Block\Core\Template');
/**
 *
 */
class Grid extends \Block\Core\Template
{
    protected $customerGroups;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('Admin\CustomerGroup/gridCustomerGroup.php');
    }
    protected function setCustomerGroups($customerGroups = null)
    {
        if ($this->customerGroups) {
            $this->customerGroups = $customerGroups;
        }
        if (!$customerGroups) {
            $customerGroups = \Mage::getModel('Model\Customer\CustomerGroup');
            $rows = $customerGroups->all();
            $this->customerGroups = $rows;
        }
        return $this;
    }
    public function getCustomerGroups()
    {
        if (!$this->customerGroups) {
            $this->setCustomerGroups();
        }
        return $this->customerGroups;
    }

}
