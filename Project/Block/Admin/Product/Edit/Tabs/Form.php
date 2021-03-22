<?php
namespace Block\Admin\Product\Edit\Tabs;

use Block\Core\Edit;

/**
 *
 */
class Form extends \Block\Core\Edit
{
    protected $brands;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('Admin/Product/Edit/Tabs/form.php');
    }
    public function getBrands()
    {
        if (!$this->brands) {
            $this->setBrands();
        }
        return $this->brands;
    }
    public function setBrands()
    {
        $brands = \Mage::getModel('Model\Brand');
        $rows = $brands->all();
        $this->brands = $rows;

    }
    // protected function setproduct($product = NULL){
    //     if ($this->product) {
    //         $this->product = $product;
    //     }
    //     $product = \Mage::getController('Model\Product');
    //     if( $id = $this->getRequest()->getGet('id')){
    //         $row = $product->load($id);
    //         if (!$row) {
    //             throw new \Exception("Invalid Id");
    //         }
    //         $this->product = $row;
    //     }
    //     $this->product = $product;
    //     return $this;
    // }
    // public function getproduct(){
    //     if (!$this->product) {
    //         $this->setproduct();
    //     }
    //     return $this->product;
    // }
}
