<?php
namespace Model\Attribute;

\Mage::loadFileByClassName('Model\Core\Table');

class AttributeOptions extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setTablename('attribute_option');
        $this->setPrimaryKey('optionId');
    }
}
