<?php
namespace Model;

/**
 *
 */
class Category extends Core\Table
{

    const STATUS_ENABLE = 1;
    const STATUS_DESABLED = 0;
    public function __construct()
    {
        $this->setTablename('category');
        $this->setPrimaryKey('categoryId');
    }
    public function getStatusOptions()
    {
        return [
            self::STATUS_DESABLED => "Disable", //or use self::
            self::STATUS_ENABLE => "Enable",
        ];
    }

    public function updatePathId()
    {
        if (!$this->parentId) {
            $path = $this->categoryId;
        } else {
            $parent = \Mage::getModel('model\category')->load($this->parentId);
            if (!$parent) {
                throw new \Exception("Unable to load parent");
            }
            $path = $parent->path . "=>" . $this->categoryId;
        }
        $this->path = $path;
        $this->Save();
    }

    public function updateChildernPathIds($categoryPathId, $parentId = null)
    {
        $categoryPathId = $categoryPathId . "=>";
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `path` LIKE '{$categoryPathId}%' ORDER BY `path` ASC";
        $categories = $this->getAdapter()->fetchAll($query);
        if ($categories) {
            foreach ($categories as $key => $row) {
                $row = $this->load($row['categoryId']);
                if ($parentId != null) {
                    $row->parentId = $parentId;
                }
                $row->updatePathId();
            }
        }
    }
}
