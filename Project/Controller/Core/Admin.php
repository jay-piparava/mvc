<?php
namespace Controller\Core;
\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Model\Core\Request');
/**
 * 
 */
class Admin
{
	protected $request = NULL;
	protected $layout = NULL;
	protected $message = NULL;
	public function __construct(){
		$this->setRequest();
	}
	public function getRequest(){
		return $this->request;
	}

	public function setRequest() {
		return $this->request = new \Model\Core\Request();
	}
	public function getUrl($method = NULL , $controller = NULL , $params = NULL , $clearParam = false) {
		$final = $_GET;
		if($clearParam)
		{
			$final = [];
		}
		if ($method == NULL) {
			$method = $_GET['a'];
		}
		if ($controller == NULL) {
			$controller = $_GET['c'];
		}
		$final['a'] = $method;
		$final['c'] = $controller;

		if(is_array($params)){
			$final = array_merge($final,$params);
		}
		$queryString = http_build_query($final);
		unset($final);
		$url = "http://localhost/Project/index.php?{$queryString}";
		return $url;
	}
	public function baseUrl($suburl = NULL)
	{	$url = 'http://localhost/Project/';
		if ($suburl) {
			$url .= $suburl;
		}
		return $url;
	}

	public function redirect($method = NULL ,$controller = NULL ,$params = NULL ,$clearParam = false) {
		 $url = $this->getUrl($method,$controller,$params,$clearParam);
		header("location:{$url}");
		exit(0);
	}

	public function setLayout(\Block\Core\Layout $layout = null)
	{
		if(!$layout) {
			$layout = new \Block\Core\Layout();
		}
		$this->layout = $layout;
		return $this;
	}

	public function getLayout()
	{
		if(!$this->layout) {
			$layout = $this->setLayout();
		}
		return $this->layout;
	}

	public function setMessage(\Model\Admin\Message $message = null)
	{
		if (!$message)
		{
			$message = \Mage::getModel('Model\Admin\Message');
		}
		$this->message = $message;
		return $this;
	}
	public function getMessage()
	{
		if (!$this->message)
		{
			$this->setMessage();
		}
		return $this->message;
	}

	public function renderLayout()
	{
		echo $this->getlayout()->toHtml();
	}
		
}

?>