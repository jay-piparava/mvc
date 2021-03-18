<?php
namespace Block\Admin\Shiping; 
\Mage::loadFileByClassName('Block\Core\Template');
/**
 * 
 */
class Grid extends \Block\Core\Template
{
	protected $shippings;

	public function __construct(){
		parent::__construct();
		$this->setTemplate('/Admin/Shipping/gridShiping.php');
	}
	protected function setShippings($shippings = NULL){
		if ($this->shippings) {
			$this->shippings = $shippings;
		}
		if (!$shippings) {
			$product = \Mage::getModel('Model\Shiping');
			$rows = $product->all();
			$this->shippings= $rows;
		}
		return $this;
	}
	public function getShippings(){
		if (!$this->shippings) {
			$this->setShippings();
		}
		return $this->shippings;
	}
}

?>