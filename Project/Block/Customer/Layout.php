<?php
namespace Block\Customer;

\Mage::loadFileByClassName('Block\Core\Template');

class Layout extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate("Customer/Layout.php");
        $this->prepareChildren();
    }
    public function prepareChildren()
    {
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Header'), 'header');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Content'), 'content');
        $this->addChild(\Mage::getBlock('Block\Customer\Layout\Footer'), 'footer');

    }

    public function getContent()
    {
        return $this->getChild('content');
    }

}
