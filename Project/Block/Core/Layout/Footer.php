<?php
namespace Block\Core\Layout;
\mage::loadFileByClassName('Block\Core\Template');
class Footer extends \Block\Core\Template
{
	public function __construct()
	{
		$this->setTemplate('Core/Layout/Footer.php');
	}
}

?>