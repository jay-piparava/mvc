<?php
namespace Model\Admin;

class Message extends Session
{
	public function __construct()
	{
		parent::__construct();
	}

	public function setSuccess($message)
	{
		$session = \Mage::getModel('Model\Admin\Session');
		$session->success = $message;
		return $this;
	}
	public function getSuccess()
	{
		$session = \Mage::getModel('Model\Admin\Session');
		return $session->success;
	}
	public function setFailure($message)
	{
		$session = \Mage::getModel('Model\Admin\Session');
		$session->failure = $message;
		return $this;
	}
	public function getFailure()
	{
		$session = \Mage::getModel('Model\Admin\Session');
		return $session->failure;
	}
	public function clearMessage()
	{
		$session = \Mage::getModel('Model\Admin\Session');
		unset($session->success);
		unset($session->failure);
		return $this;
	}
}
?>