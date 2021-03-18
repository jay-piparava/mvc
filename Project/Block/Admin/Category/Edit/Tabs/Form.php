<?php
namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Edit');
/**
 *
 */
class Form extends \Block\Core\Edit
{
    // protected $category = null;
    protected $categoryOptions = [];

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('Admin/Category/Edit/Tabs/form.php');
    }

    protected function setcategory($category = null)
    {
        if ($this->category) {
            $this->category = $category;
        }
        $category = \Mage::getModel('Model\Category');
        if ($id = $this->getRequest()->getGet('id')) {
            $row = $category->load($id);
            if (!$row) {
                throw new \Exception("Invalid Id");
            }
            $this->category = $row;
        }
        $this->category = $category;
        return $this;
    }
    // public function getcategory()
    // {
    //     if (!$this->category) {
    //         $this->setcategory();
    //     }
    //     return $this->category;
    // }

    // protected function setCategories($categories = null)
    // {
    //     if ($this->categories) {
    //         $this->categories = $categories;
    //     }
    //     if (!$categories) {
    //         $categories = \Mage::getModel('Model\Category');
    //         $rows = $categories->all();
    //         $this->categories = $rows;
    //     }
    //     return $this;
    // }
    public function getCategories()
    {
        if (!$this->categories) {
            $this->setCategories();
        }
        return $this->categories;
    }
    public function getCategoryOptions()
    {
        if (!$this->categoryOptions) {
            //if (!$this->getRequest()->getGet('id')) {
            $query = "SELECT `categoryId`,`name` FROM `{$this->getTableRow()->getTableName()}`;";
            // } else {
            //     $query = "SELECT `categoryId`,`name` FROM `{$this->getCategory()->getTableName()}` WHERE `name` NOT LIKE '{$this->getCategory()->name}%';";
            // }
            $options = $this->getTableRow()->getAdapter()->fetchPairs($query);

            if (!$this->getRequest()->getGet('id')) {
                $query = "SELECT `categoryId`,`path` FROM `{$this->getTableRow()->getTableName()}` ORDER BY path ASC;";
            } else {
                $query = "SELECT `categoryId`,`path` FROM `{$this->getTableRow()->getTableName()}` where `path` NOT LIKE '{$this->getTableRow()->path}%' ORDER BY path ASC;";
            }
            $this->categoryOptions = $this->getTableRow()->getAdapter()->fetchPairs($query);

            if ($this->categoryOptions) {
                foreach ($this->categoryOptions as $categoryId => &$pathId) {
                    $pathIds = explode("=>", $pathId);
                    foreach ($pathIds as $key => &$id) {
                        if (array_key_exists($id, $options)) {
                            $id = $options[$id];
                        }
                    }
                    $pathId = implode("=>", $pathIds);
                }
            }
            if ($this->categoryOptions) {
                $this->categoryOptions = ["0" => "Select Category"] + $this->categoryOptions;
            } else {
                $this->categoryOptions = ["0" => "Select Category"];
            }

        }
        return $this->categoryOptions;
    }
}
