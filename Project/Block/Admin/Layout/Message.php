<?php
namespace Block\Admin\Layout;

\mage::loadFileByClassName('Block\Core\Template');
class Message extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('Admin/Layout/message.php');
    }
}
