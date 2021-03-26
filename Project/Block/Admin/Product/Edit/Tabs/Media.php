<?php
namespace Block\Admin\Product\Edit\Tabs;

/**
 *
 */
class Media extends \Block\Core\Edit
{
    protected $media;
    public function __construct()
    {
        $this->setTemplate('Admin/Product/Edit/Tabs/media.php');
    }
    protected function setMedia($media = null)
    {
        if ($this->media) {
            $this->media = $media;
        }
        if (!$media) {
            $product = \Mage::getModel('Model\Product\Media');
            $id = $this->getRequest()->getGet('id');
            $query = "SELECT * FROM MEDIA WHERE productId = $id";
            $rows = $product->all($query);
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
