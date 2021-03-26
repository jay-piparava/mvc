<?php
namespace Block\Admin\Category\Edit;


/**
 *
 */
class Tabs extends \Block\Core\Edit\Tabs
{
    protected $tabs = [];
    protected $defaultTab = null;

    public function __construct()
    {
        $this->setTemplate('Core/Edit/tabs.php');
        $this->prepareTab();
    }

    public function prepareTab()
    {
        $this->addTab('Category', ['label' => 'Form', 'block' => 'Block\Admin\Category\Edit\Tabs\Form']);
        $this->addTab('Media', ['label' => 'Media', 'block' => 'Block\Admin\Category\Edit\Tabs\Media']);
        $this->addTab('CategoryTree', ['label' => 'Category Tree', 'block' => 'Block\Admin\Category\Edit\Tabs\CategoryTree']);
        $this->setDefaultTab('Category');
        return $this;
    }

}
