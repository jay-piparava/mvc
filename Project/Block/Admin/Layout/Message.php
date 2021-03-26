<?php
namespace Block\Admin\Layout;

class Message extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('Admin/Layout/message.php');
    }
}
