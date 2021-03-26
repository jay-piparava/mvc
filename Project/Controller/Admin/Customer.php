<?php
namespace Controller\Admin;


date_default_timezone_set('Asia/Calcutta');
/**
 * class for insert update and delete
 */
class Customer extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getContent();
        $sidebar = $layout->getLeft();

    }
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
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
    //function for insert
    public function formAction()
    {

        $formContent = \Mage::getBlock('Block\Admin\Customer\Edit');

        $customer = \Mage::getModel('Model\Customer');
        if ($id = $this->getRequest()->getGet('id')) {
            $customer->load($id);
        }

        $formContent->setTableRow($customer);

        $response = [
            'element' => [
                [
                    'selector' => '#content',
                    'html' => $formContent->toHtml(),
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }

    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request..");
            }

            $customer = \Mage::getController('Model\Customer');
            if ($id = $this->getRequest()->getGet('id')) {
                $customer->updatedAt = date('Y-m-d | h:i:s');
                $customer->customerId = $id;
            } else {
                $customer->createdAt = date('Y-m-d | h:i:s');
                $customer->password = rand(10000000, 1100000000);
            }
            $data = $this->getRequest()->getPost('customer');
            $customer->setData($data);
            if ($customer->save()) {
                $message = \Mage::getModel('Model\Admin\Message');
                $message->setSuccess('Record Saved Successfully...');
            } else {
                $message = \Mage::getModel('Model\Admin\Message');
                $message->setFailure('Unable to save Record...');
            }

            $this->redirect('gridHtml', null, null, true);
        } catch (\Exception $e) {
            $message = \Mage::getModel('Model\Admin\Message');
            $message->setFailure($e->getMessage());
            $this->redirect('gridHtml', null, null, true);
        }
    }
    public function deleteAction()
    {
        try {
            $id = (int) $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception("Invalid Id.");
            }
            $customer = \Mage::getModel('Model\Customer');
            if ($customer->delete($id)) {
                $message = \Mage::getModel('Model\Admin\Message');
                $message->setSuccess('Record Deleted Successfully...');
            } else {
                $message = \Mage::getModel('Model\Admin\Message');
                $message->setFailure('Unable to Delete Record...');
            }

            $this->redirect('gridHtml', null, null, true);
        } catch (\Exception $e) {
            $message = \Mage::getModel('Model\Admin\Message');
            $message->setFailure($e->getMessage());
            $this->redirect('gridHtml', null, null, true);
        }
    }

    public function statusAction()
    {
        $status = \Mage::getController('Model\Customer');
        if ($id = $this->getRequest()->getGet('id')) {
            $row = $status->load($id);
            if ($row->status == '0') {
                $status->status = '1';
                $status->customerId = $id;
                $status->save();
            } else {
                $status->status = '0';
                $status->customerId = $id;
                $status->save();
            }
        }
        $this->redirect('gridHtml', null, null, true);
    }
}
