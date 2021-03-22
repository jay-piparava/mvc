<?php
namespace Block\Customer\Layout;

\mage::loadFileByClassName('Block\Core\Template');
class Footer extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('Customer/Layout/Footer.php');
    }
}
