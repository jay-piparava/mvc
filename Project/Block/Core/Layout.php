<?php
namespace Block\Core;

\Mage::loadFileByClassName('Block\Core\Layout\Content');
\Mage::loadFileByClassName('Block\Core\Layout\Header');
\Mage::loadFileByClassName('Block\Core\Layout\Footer');
\Mage::loadFileByClassName('Block\Core\Layout\Message');
\Mage::loadFileByClassName('Block\Core\Layout\Sidebar');
\Mage::loadFileByClassName('Block\Core\Template');

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
