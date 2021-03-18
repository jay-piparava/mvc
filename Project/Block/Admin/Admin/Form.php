<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName('Block\Core\Edit');

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
