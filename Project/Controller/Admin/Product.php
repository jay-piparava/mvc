<?php
namespace Controller\Admin;

\Mage::LoadFileByClassName('Model/Core/Adapter');
\Mage::LoadFileByClassName('Controller/Core/Admin');

date_default_timezone_set('Asia/Calcutta');

class Product extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getContent();
        $sidebar = $layout->getLeft();

    }
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#content',
                    'html' => $grid,
                ],
                [
                    'selector' => '#tabs',
                    'html' => null,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }
    public function formAction()
    {
        $product = \Mage::getModel('Model\Product');
        if ($id = $this->getRequest()->getGet('id')) {
            $row = $product->load($id);
            if (!$row) {
                throw new \Exception("Invalid Id");
            }
        }
        $contentForm = \Mage::getBlock('Block\Admin\Product\Edit');
        $contentForm->setTableRow($product);

        $response = [
            'element' => [
                [
                    'selector' => '#content',
                    'html' => $contentForm->toHtml(),
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }
    //function for save data
    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request..");
            }
            $product = \Mage::getModel('Model\Product');
            if ($id = $this->getRequest()->getGet('id')) {
                $product->updatedDate = date('Y-m-d | h:i:s');
                $product->productId = $id;
            } else {
                $product->createdDate = date('Y-m-d | h:i:s');
                $product->sku = bin2hex(random_bytes(7));
            }
            $data = $this->getRequest()->getPost('product');
            $product->setData($data);
            if ($product->save()) {
                $message = \Mage::getModel('Model\Admin\Message');
                $message->setSuccess('Record Saved Successfully...');
            } else {
                $message = \Mage::getModel('Model\Admin\Message');
                $message->setFailure('Unable to save Record...');
            }
            $this->redirect('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $message = \Mage::getModel('Model\Admin\Message');
            $message->setFailure($e->getMessage());
            $this->redirect('gridHtml', null, [], true);
        }
    }
    public function deleteAction()
    {
        try {
            $id = (int) $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception("Invalid Id.");
            }

            $Product = \Mage::getModel('Model\Product');
            if ($Product->delete($id)) {
                $message = \Mage::getModel('Model\Admin\Message');
                $message->setSuccess('Record Deleted Successfully...');
            } else {
                $message = \Mage::getModel('Model\Admin\Message');
                $message->setFailure('Unable to Delete Record...');
            }

            $this->redirect('gridHtml', null, [], true);
        } catch (\Exception $e) {
            echo $e->getMessage();
            $this->redirect('gridHtml', null, [], true);
        }
    }

    public function statusAction()
    {
        $status = \Mage::getModel('Model\Product');
        if ($id = $this->getRequest()->getGet('id')) {
            $row = $status->load($id);
            if ($row->status == '0') {
                $status->status = '1';
                $status->productId = $id;
                $status->save();
            } else {
                $status->status = '0';
                $status->productId = $id;
                $status->save();
            }
        }
        $this->redirect('gridHtml', null, [], true);
    }
}
