<?php
namespace Block\Admin\Shiping;

\Mage::loadFileByClassName('Block\Core\Edit');
/**
 *
 */
class Form extends \Block\Core\Edit
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('/Admin/shipping/formShiping.php');
    }

}
