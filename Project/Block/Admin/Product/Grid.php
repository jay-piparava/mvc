<?php
namespace Block\Admin\Product;

\Mage::loadFileByClassName('Block\Core\Template');
/**
 *
 */
class Grid extends \Block\Core\Template
{
 protected $products;

 public function __construct()
 {
  $this->setTemplate('Admin/Product/gridProduct.php');
 }

 protected function setProducts($products = null)
 {
  if ($this->products) {
   $this->products = $products;
  }
  if (!$products) {
   $product = \Mage::getModel('Model\Product');
   $rows = $product->all();
   $this->products = $rows;
  }
  return $this;
 }
 public function getProducts()
 {
  if (!$this->products) {
   $this->setProducts();
  }
  return $this->products;
 }
}
