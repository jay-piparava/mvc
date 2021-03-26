<?php
namespace Controller\Admin\Attribute;

use Mage;


class AttributeOption extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getContent();
        $sidebar = $layout->getLeft();

    }
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Attribute\Edit')->toHtml();
        $tabs = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs')->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#content',
                    'html' => $grid,
                ],
                [
                    'selector' => '#tabs',
                    'html' => $tabs,
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
            $id = $this->getRequest()->getGet('id');
            if ($data = $this->getRequest()->getPost('attributeOption')) {
                $deleteId = [];
                foreach ($data as $key => $value) {
                    $deleteId[] = $value['optionId'];
                }
                $deleteId = implode(',', $deleteId);
                $attributeOption = \Mage::getModel('Model\Attribute\AttributeOptions');

                if ($deleteId) {
                    $query = "DELETE FROM `{$attributeOption->getTableName()}`
                            WHERE `{$attributeOption->getPrimaryKey()}` NOT IN ($deleteId) AND `attributeId` = $id ";
                    $attributeOption->deleteByQuery($query);
                }
            } else {
                $attributeOption = \Mage::getModel('Model\Attribute\AttributeOptions');
                $query = "DELETE FROM `{$attributeOption->getTableName()}`
                            WHERE `attributeId` = $id ";
                $attributeOption->deleteByQuery($query);
            }
            if ($data = $this->getRequest()->getPost('attributeOption')) {
                foreach ($data as $key => $value) {
                    $attributeOption = \Mage::getModel('Model\Attribute\AttributeOptions');
                    $attributeOption->setData($value);
                    $attributeOption->save();
                }
            }

            if ($newData = $this->getRequest()->getPost('new')) {
                if ($id = $this->getRequest()->getGet('id')) {
                    for ($i = 0; $i < count($newData); $i = $i + 2) {
                        $attributeOption = \Mage::getModel('Model\Attribute\AttributeOptions');
                        $nextAddr = $i + 1;
                        $query = "INSERT INTO `{$attributeOption->getTableName()}`
                                    (`name`,`attributeId`,`sortOrder`)
                                VALUES
                                    ('$newData[$i]','$id','$newData[$nextAddr]')
                                ";
                        $attributeOption->getAdapter()->insert($query);
                    }
                }
            }
            $this->redirect('gridHtml', 'Admin_Attribute_AttributeOption');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('gridHtml', 'Admin_Attribute');
        }
    }
}
