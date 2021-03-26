<?php
namespace Controller\Admin;

class Attribute extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getContent();
        $sidebar = $layout->getLeft();

    }
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
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
        $contentForm = \Mage::getBlock('Block\Admin\Attribute\Edit');

        $attribute = \Mage::getModel('Model\Attribute');

        if ($id = $this->getRequest()->getGet('id')) {
            $attribute->load($id);
        }

        $contentForm->setTableRow($attribute);

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

    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request");
            }

            $attribute = \Mage::getModel('Model\Attribute');
            if ($id = $this->getRequest()->getGet('id')) {
                $attribute->attributeId = $id;
            }

            $data = $this->getRequest()->getPost('attribute');
            $query = "ALTER TABLE {$data['entityTypeId']} ADD {$data['name']} {$data['backendType']};";
            $attribute->getAdapter()->query($query);
            $attribute->setData($data);
            if ($attribute->save()) {
                $this->getMessage()->setSuccess('Record Saved SuccessFully...');
            } else {
                $this->getMessage()->setFailure('Unable to Save Record...');
            }
            $this->redirect('gridHtml', null, null, true);

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('gridHtml', null, null, true);
        }
    }

    public function deleteAction()
    {
        try {
            $id = (int) $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception("Invalid Id");
            }
            $rowAttriute = \Mage::getModel('Model\Attribute');
            $row = $rowAttriute->load($id);
            $query = "ALTER TABLE `{$row->entityTypeId}` DROP COLUMN `{$row->name}`";
            $rowAttriute->getAdapter()->query($query);
            $attribute = \Mage::getModel('Model\Attribute');
            if ($attribute->delete($id)) {
                $this->getMessage()->setSuccess('Record Deleted Successfully...');
            } else {
                $this->getMessage()->setFailure('Unable to Delete Record...');
            }
            $this->redirect('gridHtml', null, null, null);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('gridHtml', null, null, true);
        }
    }
}
