<?php
namespace Block\Admin\Layout;

class Sidebar extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('Admin/Layout/sidebar.php');
    }
}
