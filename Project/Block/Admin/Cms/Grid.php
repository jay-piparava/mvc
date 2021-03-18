<?php
namespace Block\Admin\Cms;
\Mage::loadFileByClassName('Block\Core\Template');
/**
 * 
 */
class Grid extends \Block\Core\Template
{
	protected $cms;

	public function __construct(){
		$this->setTemplate('Admin/Cms/gridCms.php');
	}
	protected function setCms($cms = NULL){
		if ($this->cms) {
			$this->cms = $cms;
		}
		if (!$cms) {
			$cms = \Mage::getModel('Model\Cms');
			$rows = $cms->all();
			$this->cms= $rows;
		}
		return $this;
	}
	public function getCms(){
		if (!$this->cms) {
			$this->setCms();
		}
		return $this->cms;
	}
}

?>