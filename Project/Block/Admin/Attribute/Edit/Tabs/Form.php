<?php
namespace Block\Admin\Attribute\Edit\Tabs;


class Form extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('Admin/Attribute/Edit/Tabs/form.php');
    }
}
