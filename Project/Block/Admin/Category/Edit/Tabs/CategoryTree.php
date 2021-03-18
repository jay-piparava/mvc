<?php
namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Edit');
/**
 *
 */
class CategoryTree extends \Block\Core\Edit
{

    public function __construct()
    {
        $this->setTemplate('Admin/category/Edit/Tabs/categoryTree.php');
    }
}
