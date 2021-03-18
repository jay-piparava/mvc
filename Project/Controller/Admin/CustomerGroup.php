<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');

date_default_timezone_set('Asia/Calcutta');
/**
 * class for insert update and delete
 */
class CustomerGroup extends \Controller\Core\Admin
{

    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getContent();

    }
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('Block\Admin\CustomerGroup\Grid')->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#content',
                    'html' => $grid,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }

    public function formAction()
    {
        $contentForm = \Mage::getBlock('Block\Admin\CustomerGroup\Form');

        $customerGroup = \Mage::getModel('Model\Customer\CustomerGroup');
        if ($id = $this->getRequest()->getGet('id')) {
            $customerGroup->load($id);
        }
        $contentForm->setTableRow($customerGroup);
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
            $customerGroup = \Mage::getController('Model\Customer\CustomerGroup');
            if ($id = $this->getRequest()->getGet('id')) {
                //$customerGroup->updatedDate = date('Y-m-d | h:i:s');
                $customerGroup->groupId = $id;
            } else {
                $customerGroup->createdAt = date('Y-m-d | h:i:s');
            }
            $data = $this->getRequest()->getPost('customerGroup');
            $customerGroup->setData($data);
            if ($customerGroup->save()) {
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
            $customerGroup = \Mage::getController('Model\CustomerGroup');
            if ($customerGroup->delete($id)) {
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
}
