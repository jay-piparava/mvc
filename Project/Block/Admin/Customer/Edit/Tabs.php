<?php
namespace Block\Admin\Customer\Edit;


/**
 *
 */
class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTab()
    {
        $this->addTab('Customer', ['label' => 'Form', 'block' => 'Block\Admin\Customer\Edit\Tabs\Form']);
        $this->addTab('Address', ['label' => 'Address', 'block' => 'Block\Admin\Customer\Edit\Tabs\Address']);
        $this->setDefaultTab('Customer');
        return $this;
    }

}
