<?php
namespace Block\Admin\Payment; 
\Mage::loadFileByClassName('Block\Core\Template');
/**
 * 
 */
class Grid extends \Block\Core\Template
{
	protected $payments;

	public function __construct(){
		parent::__construct();
		$this->setTemplate('Admin/Payment/gridPayment.php');
	}
	protected function setPayments($payments = NULL){
		if ($this->payments) {
			$this->payments = $payments;
		}
		if (!$payments) {
			$payments = \Mage::getModel('Model\Payment');
			$rows = $payments->all();
			$this->payments= $rows;
		}
		return $this;
	}
	public function getPayments(){
		if (!$this->payments) {
			$this->setPayments();
		}
		return $this->payments;
	}
	
}

?>