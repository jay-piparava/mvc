<?php
namespace Block\Admin\Customer;
\Mage::loadFileByClassName('Block\Core\Template');
/**
 * 
 */
class Grid extends \Block\Core\Template
{
	protected $customers;

	public function __construct(){
		parent::__construct();
		$this->setTemplate('Admin/customer/gridcustomer.php');
	}
	protected function setCustomers($customers = NULL){
		if ($this->customers) {
			$this->customers = $customers;
		}
		if (!$customers) {
			$customer = \Mage::getModel('Model\Customer');
			$query = "SELECT
								c.`customerId`,
								c.`firstName`,
								c.`lastName`,
								c.`email`, 
								c.`mobile`, 
								c.`password`, 
								c.`status`, 
								cg.`name` 
							FROM `customer` AS c , `customer_group` AS cg 
							WHERE c.`groupId` = cg.`groupId`";
			$rows = $customer->all($query);
			$this->customers= $rows;
		}
		return $this;
	}
	public function getCustomers(){
		if (!$this->customers) {
			$this->setCustomers();
		}
		return $this->customers;
	}
}

?>