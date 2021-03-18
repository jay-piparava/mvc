<?php
namespace Block\Core\Layout;

\Mage::loadFileByClassName('Block\Core\Template');
class Sidebar extends \Block\Core\Template
{
	public function __construct()
	{
		$this->setTemplate('Core/Layout/sidebar.php');
	}
}

?>