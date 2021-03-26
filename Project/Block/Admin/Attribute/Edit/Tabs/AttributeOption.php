<?php
namespace Block\Admin\Attribute\Edit\Tabs;


class AttributeOption extends \Block\Core\Edit
{
    protected $attributeOptions = null;

    public function __construct()
    {
        $this->setTemplate('Admin/Attribute/Edit/Tabs/AttributeOption.php');
    }

    public function getAttributeOptions()
    {
        if (!$this->attributeOptions) {
            $this->setAttributeOptions();
        }
        return $this->attributeOptions;
    }

    public function setAttributeOptions()
    {
        $attributeOptionRows = \Mage::getModel("Model\Attribute\AttributeOptions");
        if ($id = $this->getTableRow()->attributeId) {
            $query = "SELECT *
                        FROM `{$attributeOptionRows->getTableName()}`
                        WHERE `attributeId` = $id
                    ";
            $row = $attributeOptionRows->all($query);
            $this->attributeOptions = $row;
        } else {
            $this->attributeOptions = $attributeOptionRows;
        }
    }
}
