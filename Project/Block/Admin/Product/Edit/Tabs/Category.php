<?php
namespace Block\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
/**
 * 
 */
class Category extends \Block\Core\Template
{
	
	function __construct()
	{
		$this->setTemplate('Product/Edit/Tabs/category.php');
	}
}

?>