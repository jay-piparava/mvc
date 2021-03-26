<?php
namespace Block\Admin\Admin;


/**
 *
 */
class Form extends \Block\Core\Edit
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('Admin/Admin/formAdmin.php');
    }

}
