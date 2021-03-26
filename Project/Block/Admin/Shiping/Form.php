<?php
namespace Block\Admin\Shiping;

class Form extends \Block\Core\Edit
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('/Admin/shipping/formShiping.php');
    }

}
