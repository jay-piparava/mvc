<?php
namespace Block\Admin\Attribute;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{   
    protected $attributes = NULL;

    public function __construct()
    {
        $this->setTemplate('Admin/Attribute/gridAttribute.php');

    }

    public function setAttributes()
    {
        $attributes = \Mage::getModel('Model\Attribute');
        $rows = $attributes->all();
        if ($rows) {
            $this->attributes = $rows;
        }
    }

    public function getAttributes()
    {
        if (!$this->attributes) {
            $this->setAttributes();
        }
        return $this->attributes;
    }
}


?>