<?php
namespace Block\Admin;

\Mage::loadFileByClassName('Block\Admin\Layout\Content');
\Mage::loadFileByClassName('Block\Admin\Layout\Header');
\Mage::loadFileByClassName('Block\Admin\Layout\Footer');
\Mage::loadFileByClassName('Block\Admin\Layout\Message');
\Mage::loadFileByClassName('Block\Admin\Layout\Sidebar');
\Mage::loadFileByClassName('Block\Core\Template');

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
