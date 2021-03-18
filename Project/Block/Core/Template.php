<?php
namespace Block\Core;

/**
 *
 */
class Template
{
    protected $template = null;
    protected $children = [];
    protected $url = null;
    protected $request = null;
    protected $tabs = [];
    protected $defaultTab = null;

    public function __construct()
    {
        $this->setUrl();
        $this->setRequest();
    }

    public function setUrl($url = null)
    {
        if (!$url) {
            $this->url = \Mage::getModel('Model\Core\Url');
        }
        return $this->url;
    }

    public function getUrl()
    {
        if (!$this->url) {
            $this->setUrl();
        }
        return $this->url;
    }
    public function baseUrl($suburl)
    {
        return $this->getUrl()->baseUrl($suburl);
    }
    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    }

    public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest();
        }
        return $this->request;
    }
    public function toHtml()
    {
        ob_start();
        require_once 'View/' . $this->getTemplate();
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }
    public function getTemplate()
    {
        return $this->template;
    }

    public function setChildren(array $children = [])
    {
        $this->children = $children;
        return $this;
    }
    public function getChildren()
    {
        return $this->children;
    }
    public function addChild(\Block\Core\Template $child, $key = null)
    {
        if (!$key) {
            $key = get_class($child);
        }

        $this->children[$key] = $child;
        return $this;
    }

    public function getChild($key)
    {
        // print_r($this->children);die();
        if (!array_key_exists($key, $this->children)) {
            return null;
        }
        return $this->children[$key];
    }
    public function removeChild($key)
    {
        if (array_key_exists($key, $this->children)) {
            unset($this->children[$key]);
        }
        return $this;
    }

    public function getMessage()
    {
        return \Mage::getModel('Model\Admin\Message');
    }

    // public function setTab(array $tabs = [])
    // {
    //     $this->tabs = $tabs;
    // }

    public function getTabs()
    {
        return $this->tabs;
    }

    public function addTab($key, $tab = [])
    {
        $this->tabs[$key] = $tab;
    }

    public function removeTab($key)
    {
        if (!array_key_exists($key, $this->tabs)) {
            unset($this->tabs[$key]);
        }
    }
    public function setDefaultTab($defaultTab)
    {
        $this->defaultTab = $defaultTab;
    }

    public function getDefaultTab()
    {
        return $this->defaultTab;
    }

}
