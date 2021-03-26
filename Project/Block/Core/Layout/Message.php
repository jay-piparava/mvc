<?php
namespace Block\Core\Layout;

class Message extends \Block\Core\Template
{
	public function __construct()
	{
		$this->setTemplate('Core/Layout/message.php');
	}
}

?>