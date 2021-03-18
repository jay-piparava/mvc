<?php
namespace Model\Core;
/**
 * 
 */
class Request
{
	public function isPost() {
		if($_SERVER['REQUEST_METHOD'] != 'POST') {
			return false;	
		}
		return true;
	}
	public function getPost($key = NULL , $value = NULL) {
		if(!$key) {
			return $_POST;
		}
		if (!array_key_exists($key, $_POST)) {
			return $value;
		}
		return $_POST[$key];
	}
	public function getGet($key = NULL , $value = NULL) {
		if(!$key) {
			return $_GET;
		}
		if (!array_key_exists($key, $_GET)) {
			return $value;
		}
		return $_GET[$key];
	}
	public function getActionName() {
		return $this->getGet('a','home');
	}
	public function getControllerName() {
		return $this->getGet('c','Admin_home');
	}
}


?>