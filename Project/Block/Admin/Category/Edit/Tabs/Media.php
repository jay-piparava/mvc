<?php
namespace Block\Admin\Category\Edit\Tabs;

/**
 *
 */
class Media extends \Block\Core\Edit
{
    protected $media = null;
    public function __construct()
    {
        $this->setTemplate('Admin/Category/Edit/Tabs/media.php');
    }
    protected function setMedia($media = null)
    {
        if ($this->media) {
            $this->media = $media;
        }
        if (!$media) {
            $category = \Mage::getModel('Model\Category\Media');
            $id = $this->getRequest()->getGet('id');
            $query = "SELECT * FROM `{$category->getTableName()}` WHERE categoryId = $id";
            $rows = $category->all($query);
            $this->media = $rows;
        }
        return $this;
    }
    public function getMedia()
    {
        if (!$this->media) {
            $this->setMedia();
        }
        return $this->media;
    }
}
