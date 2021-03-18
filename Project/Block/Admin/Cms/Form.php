<?php
namespace Block\Admin\Cms;

\Mage::loadFileByClassName('Block\Core\Edit');

/**
 *
 */
class Form extends \Block\Core\Edit
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('Admin/Cms/formCms.php');
    }

}
