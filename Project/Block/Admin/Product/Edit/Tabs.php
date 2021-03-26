<?php
namespace Block\Admin\Product\Edit;
/**
 *
 */
class Tabs extends \Block\Core\Edit\Tabs
{

    public function prepareTab()
    {
        $this->addTab('Product', ['label' => 'Form', 'block' => 'Block\Admin\Product\Edit\Tabs\Form']);
        $this->addTab('Attribute', ['label' => 'Attribute', 'block' => 'Block\Admin\Product\Edit\Tabs\Attribute']);
        $this->addTab('Media', ['label' => 'Media', 'block' => 'Block\Admin\Product\Edit\Tabs\Media']);
        $this->addTab('GroupPrice', ['label' => 'Group Price', 'block' => 'Block\Admin\Product\Edit\Tabs\GroupPrice']);
        $this->setDefaultTab('Product');
        return $this;
    }

}
