<?php
namespace Block\Core;


class Layout extends Template
{
    public function __construct()
    {
        $this->setTemplate("Core/Layout/oneColumn.php");
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
