<?php
namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Edit');
/**
 *
 */
class Media extends \Block\Core\Edit
{

    public function __construct()
    {
        $this->setTemplate('Admin/Category/Edit/Tabs/media.php');
    }
}
