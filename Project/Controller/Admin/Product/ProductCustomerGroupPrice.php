<?php
namespace Controller\Admin\Product;

\Mage::loadFileByClassName('Controller\Core\Admin');

date_default_timezone_set('Asia/Calcutta');

class ProductCustomerGroupPrice extends \Controller\Core\Admin
{
    public function saveAction()
    {
        $data = $this->getRequest()->getPost('ProductCustomerGroupPrice');

        $productId = $this->getRequest()->getGet('id');

        foreach ($data as $key => $result) {
            $groupPrice = \Mage::getModel('Model\Product\ProductCustomerGroupPrice');
            $groupPrice->setData($result);
            $groupPrice->productId = $productId;
            $groupPrice->createdAt = date('Y-m-d | h:i:s');

            $groupPrice->save();
        }
        $this->redirect('form', 'Admin_Product');
    }
}
