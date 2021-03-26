<?php
namespace Block\Admin\Home;
/**
 * 
 */
class Home extends \Block\Core\Template
{
	
	function __construct()	
	{
		parent::__construct();
		$this->setTemplate('Admin/Home/home.php');
	}
}

?>