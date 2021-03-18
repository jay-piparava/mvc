<?php
namespace Controller\Admin\Product;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');

date_default_timezone_set('Asia/Calcutta');
/**
 * class for insert update and delete
 */
class Attribute extends \Controller\Core\Admin
{
    public function saveAction()
    {
        $id = $this->getRequest()->getGet('id');
        $data = $this->getRequest()->getPost();
        $product = \Mage::getModel('Model\Product');
        $keys = [];
        $values = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $keys[] = $key;
                $values[] = $value;
            } else {
                $product->$key = $value;
            }
        }
        $product->save();
        $product->setArrayData($keys, $values);
        $product->arrayUpdate($id);

    }
}
