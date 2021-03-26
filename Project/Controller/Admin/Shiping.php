<?php
namespace Controller\Admin;


date_default_timezone_set('Asia/Calcutta');
/**
 * class for insert update and delete
 */
class Shiping extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getContent();
        $sidebar = $layout->getLeft();

    }
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Shiping\Grid')->toHtml();
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
        $contentForm = \Mage::getBlock('Block\Admin\shiping\Form');

        $shiping = \Mage::getModel('Model\Shiping');
        if ($id = $this->getRequest()->getGet('id')) {
            $shiping->load($id);
        }
        $contentForm->setTableRow($shiping);

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
            $shiping = \Mage::getModel('Model\Shiping');
            if ($id = $this->getRequest()->getGet('id')) {
                $shiping->updatedDate = date('Y-m-d | h:i:s');
                $shiping->methodId = $id;
            } else {
                $shiping->createdDate = date('Y-m-d | h:i:s');
            }
            $data = $this->getRequest()->getPost('shiping');
            $shiping->setData($data);
            if ($shiping->save()) {
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
            $shiping = \Mage::getModel('Model\Shiping');
            if ($shiping->delete($id)) {
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
        $status = \Mage::getModel('Model\Shiping');
        if ($id = $this->getRequest()->getGet('id')) {
            $row = $status->load($id);
            if ($row->status == '0') {
                $status->status = '1';
                $status->methodId = $id;
                $status->save();
            } else {
                $status->status = '0';
                $status->methodId = $id;
                $status->save();
            }
        }
        $this->redirect('gridHtml', null, null, true);
    }
}
