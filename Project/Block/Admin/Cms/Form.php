<?php
namespace Block\Admin\Cms;


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
