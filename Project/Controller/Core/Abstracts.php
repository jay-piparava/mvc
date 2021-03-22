<?php
namespace Controller\Core;

\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Model\Core\Request');
/**
 *
 */
class Abstracts
{
    protected $request = null;
    protected $layout = null;
    protected $message = null;
    public function __construct()
    {
        $this->setRequest();
    }
    public function getRequest()
    {
        return $this->request;
    }

    public function setRequest()
    {
        return $this->request = new \Model\Core\Request();
    }
    public function getUrl($method = null, $controller = null, $params = null, $clearParam = false)
    {
        $final = $_GET;
        if ($clearParam) {
            $final = [];
        }
        if ($method == null) {
            $method = $_GET['a'];
        }
        if ($controller == null) {
            $controller = $_GET['c'];
        }
        $final['a'] = $method;
        $final['c'] = $controller;

        if (is_array($params)) {
            $final = array_merge($final, $params);
        }
        $queryString = http_build_query($final);
        unset($final);
        $url = "http://localhost/Project/index.php?{$queryString}";
        return $url;
    }
    public function baseUrl($suburl = null)
    {$url = 'http://localhost/Project/';
        if ($suburl) {
            $url .= $suburl;
        }
        return $url;
    }

    public function redirect($method = null, $controller = null, $params = null, $clearParam = false)
    {
        $url = $this->getUrl($method, $controller, $params, $clearParam);
        header("location:{$url}");
        exit(0);
    }

    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if (!$layout) {
            $layout = new \Block\Core\Layout();
        }
        $this->layout = $layout;
        return $this;
    }

    public function getLayout()
    {
        if (!$this->layout) {
            $layout = $this->setLayout();
        }
        return $this->layout;
    }

    public function setMessage(\Model\Core\Message $message = null)
    {
        if (!$message) {
            $message = \Mage::getModel('Model\Core\Message');
        }
        $this->message = $message;
        return $this;
    }
    public function getMessage()
    {
        if (!$this->message) {
            $this->setMessage();
        }
        return $this->message;
    }

    public function renderLayout()
    {
        echo $this->getlayout()->toHtml();
    }

}
