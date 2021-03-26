<?php
namespace Controller\Admin;

date_default_timezone_set('Asia/Calcutta');
/**
 * class for insert update and delete
 */
class Category extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getContent();
        $sidebar = $layout->getLeft();

    }
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Category\Grid')->toHtml();
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
        $contentForm = \Mage::getBlock('Block\Admin\Category\Edit');

        $category = \Mage::getModel('Model\Category');
        if ($id = $this->getRequest()->getGet('id')) {
            $category->load($id);
        }

        $contentForm->setTableRow($category);

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
        try
        {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request");
            }
            $category = \Mage::getModel('model\category');
            $categoryId = $this->getRequest()->getGet('id');
            if ($categoryId) {
                $category = $category->load($categoryId);
                if (!$category) {
                    throw new \Exception("Data Not Found");
                }
            }
            $categoryPathId = $category->path;
            $categoryData = $this->getRequest()->getPost('category');
            $category->setData($categoryData);
            $category->createdAt = date('Y-m-d | h:i:s');
            $category->Save();
            $category->updatePathId();
            $category->updateChildernPathIds($categoryPathId, $parentId = null);
            $this->getMessage()->setSuccess("Record Save Successfully..");
            $this->redirect('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('gridHtml', null, [], true);
        }
    }
    public function deleteAction()
    {
        try
        {
            $category = \Mage::getModel('model\category');
            if (($id = $this->getRequest()->getGet('id'))) {
                $category = $category->load($id);
                if (!$category) {
                    throw new \Exception("Invalid Data");
                }
            }
            $path = $category->path;
            $parentId = $category->parentId;
            $category->updateChildernPathIds($path, $parentId);
            $category->delete($id);
            $this->getMessage()->setSuccess("Record Delete Successfully..");
            $this->redirect('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('show', null, [], true);
        }
    }

    public function statusAction()
    {
        $status = \Mage::getController('Model\Category');
        if ($id = $this->getRequest()->getGet('id')) {
            $row = $status->load($id);
            if ($row->status == '0') {
                $status->status = '1';
                $status->categoryId = $id;
                $status->save();
            } else {
                $status->status = '0';
                $status->categoryId = $id;
                $status->save();
            }
        }
        $this->redirect('gridHtml', null, null, true);
    }
}
