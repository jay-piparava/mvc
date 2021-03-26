<?php
namespace Block\Admin\CustomerGroup;

/**
 *
 */
class Form extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('Admin/CustomerGroup/formCustomerGroup.php');
    }
}
