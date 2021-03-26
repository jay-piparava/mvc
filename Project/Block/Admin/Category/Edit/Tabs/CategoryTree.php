<?php
namespace Block\Admin\Category\Edit\Tabs;

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
