<?php
namespace Block\Admin\Category;
/**
 * 
 */
class Grid extends \Block\Core\Template
{
	protected $categories;
	protected $categoryOptions;

	public function __construct(){
		parent::__construct();
		$this->setTemplate('Admin/Category/gridCategory.php');
	}
	protected function setCategories($categories = NULL){
		if ($this->categories) {
			$this->categories = $categories;
		}
		if (!$categories) {
			$categories = \Mage::getModel('Model\Category');
			$query = "SELECT * FROM `{$categories->getTableName()}` ORDER BY `path` ASC;";
			$rows = $categories->all($query);
			$this->categories= $rows;
		}
		return $this;
	}
	public function getCategories(){
		if (!$this->categories) {
			$this->setCategories();
		}
		return $this->categories;
	}
	public function getName($category)
	{
		$categoryModel = \Mage::getModel('model\category');
		if (!$this->categoryOptions) {
			$query = "SELECT `categoryId`,`name` FROM `{$categoryModel->getTableName()}`;";
			$this->categoryOptions = $categoryModel->getAdapter()->fetchPairs($query);
		}

		$pathIds = explode("=>",$category->path);
		foreach ($pathIds as $key => &$id) {
			if (array_key_exists($id,$this->categoryOptions)) {
				$id = $this->categoryOptions[$id];
			}
		}
		$name = implode("=>",$pathIds);
		return $name;
	}
}

?>