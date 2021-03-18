<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Edit');
/**
 *
 */
class Attribute extends \Block\Core\Edit
{
    protected $attribute = null;
    protected $options = null;

    public function __construct()
    {
        $this->setTemplate('Admin/Product/Edit/Tabs/attribute.php');
    }
    public function getOptions()
    {
        if (!$this->options) {
            $this->setOptions();
        }
        return $this->options;
    }
    public function setOptions($options = null)
    {
        if ($options) {
            $this->options = $options;
            return $this;
        }
        $options = \Mage::getModel('Model\Attribute\AttributeOptions');
        $query = "SELECT `name` FROM `{$options->getTableName()}` ORDER BY `sortOrder` ASC";
        $options = $options->all($query);
        $this->options = $options;
        return $this;
    }

    public function setAttribute($attribute = null)
    {
        if ($attribute) {
            $this->attribute = $attribute;
            return $this;
        }
        $attribute = \Mage::getModel('Model\Product');
        $id = $this->getRequest()->getGet('id');
        $attribute = $attribute->load($id);
        $this->attribute = $attribute;
        return $this;
    }
    public function getAttribute()
    {
        if (!$this->attribute) {
            $this->setAttribute();
        }
        return $this->attribute;
    }
    public function getAttributes()
    {
        $query = "SELECT * FROM `attribute` WHERE entityTypeId = 'product' ORDER BY `setOrder` ASC ; ";
        $attribute = \Mage::getModel('Model\Attribute');
        return $attribute->all($query);
    }
}
