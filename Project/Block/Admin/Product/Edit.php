<?php
namespace Block\Admin\Product;

/**
 *
 */
class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Product\Edit\Tabs'));
    }
}
