<?php
namespace Model\Attribute;

class AttributeOptions extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setTablename('attribute_option');
        $this->setPrimaryKey('optionId');
    }
}
