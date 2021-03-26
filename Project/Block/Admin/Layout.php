<?php
namespace Block\Admin;

class Layout extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate("Admin/Layout/oneColumn.php");
        $this->prepareChildren();
    }
    public function prepareChildren()
    {
        $this->addChild(new Layout\Header(), 'header');
        $this->addChild(new Layout\Content(), 'content');
        $this->addChild(new Layout\Footer(), 'footer');
        $this->addChild(new Layout\Message(), 'message');
        $this->addChild(new Layout\Sidebar(), 'sidebar');
    }

    public function getContent()
    {
        return $this->getChild('content');
    }

    public function getLeft()
    {
        return $this->getChild('sidebar');
    }
}
