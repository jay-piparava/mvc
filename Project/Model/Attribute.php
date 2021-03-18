<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class Attribute extends Core\Table
{
    const ENTITY_TYPE_PRODUCT = 'product';
    const ENTITY_TYPE_CATEGORY = 'category';

    const INPUT_TYPE_TEXT = 'text';
    const INPUT_TYPE_SELECT = 'select';
    const INPUT_TYPE_CHECKBOX = 'checkbox';
    const INPUT_TYPE_RADIO = 'radio';
    const INPUT_TYPE_SELECT_MULTIPLE = 'select-multiple';
    const INPUT_TYPE_TEXTAREA = 'textarea';

    const BACKEND_TYPE_VARCHAR = 'varchar(256)';
    const BACKEND_TYPE_TEXT = 'text';
    const BACKEND_TYPE_DECIMAL = 'decimal(10,2)';
    const BACKEND_TYPE_INT = 'int(11)';

    public function __construct()
    {
        $this->setTablename('attribute');
        $this->setPrimaryKey('attributeId');
    }

    public function getEntityTypeOptions()
    {
        return [
            self::ENTITY_TYPE_PRODUCT => 'Product',
            self::ENTITY_TYPE_CATEGORY => 'Category',
        ];
    }

    public function getInputTypeOptions()
    {
        return [
            self::INPUT_TYPE_TEXT => 'Text',
            self::INPUT_TYPE_SELECT => 'Select',
            self::INPUT_TYPE_CHECKBOX => 'CheckBox',
            self::INPUT_TYPE_TEXTAREA => 'TextArea',
            self::INPUT_TYPE_RADIO => 'Radio',
            self::INPUT_TYPE_SELECT_MULTIPLE => 'Select Multiple',
        ];
    }

    public function getBackendTypeOptions()
    {
        return [
            self::BACKEND_TYPE_INT => 'Int',
            self::BACKEND_TYPE_VARCHAR => 'Varchar',
            self::BACKEND_TYPE_TEXT => 'Text',
            self::BACKEND_TYPE_DECIMAL => 'Decimal',
        ];
    }

    public function getOptions()
    {
        if (!$this->attributeId) {
            return false;
        }
        $attributeOption = \Mage::getModel('Model\Attribute\AttributeOptions');
        $key = $this->getPrimaryKey();
        $query = "SELECT * FROM `{$attributeOption->getTableName()}` WHERE {$key} = '{$this->$key}' ";
        $options = $attributeOption->all($query);
        return $options;
    }
}
