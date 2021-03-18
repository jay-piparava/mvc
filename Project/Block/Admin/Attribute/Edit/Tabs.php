<?php
namespace Block\Admin\Attribute\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

/**
 *
 */
class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTab()
    {
        $this->addTab('Attribute', ['label' => 'Form', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Form']);
        if ($id = $this->getRequest()->getGet('id')) {
            $attribute = \Mage::getModel('Model\Attribute');
            $row = $attribute->load($id);
            if ($row->inputType != 'text' && $row->inputType != 'textarea') {
                $this->addTab('option', ['label' => 'Option', 'block' => 'Block\Admin\Attribute\Edit\Tabs\AttributeOption']);
            }

        }
        // $this->addTab('GroupPrice', ['label' => 'Group Price', 'block' => 'Block\Admin\Product\Form\Tabs\GroupPrice']);
        $this->setDefaultTab('Attribute');
        return $this;
    }

}
