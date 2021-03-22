<?php
namespace Controller\Admin\Category;

\Mage::loadFileByClassName('controller\core\admin');

class Media extends \Controller\Core\Admin
{
    public function gridHtml()
    {
        $grid = \Mage::getBLock('block\admin\category\grid')->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $grid,
                ],
                [
                    'selector' => '#tabHtml',
                    'html' => null,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);

    }
    public function formAction()
    {
        $edit = \Mage::getBLock('block\admin\category\edit');
        $product = \Mage::getModel('model\category');
        if ($id = $this->getRequest()->getGet('id')) {
            if (!$product->load($id)) {
                throw new Exception("No Category Data Found");
            }
        }
        $edit->setTableRow($product);
        $contentHtml = $edit->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#content',
                    'html' => $contentHtml,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }

    public function UploadAction()
    {

        $categoryMedia = \Mage::getModel('model\category\media');
        $photo = $_FILES['file']['name'];
        $temName = $_FILES['file']['tmp_name'];
        $path = 'Images/Category/';
        $newName = time() . "-" . rand(1000, 9999) . "-" . $photo;
        move_uploaded_file($temName, $path . $newName);
        $categoryMedia->image = $newName;
        $categoryMedia->categoryId = $this->getRequest()->getGet('id');
        $categoryMedia->Save();
        $this->redirect('form', 'admin_category_media', ["tab" => "media"], false);
    }

    public function updateAction()
    {
        $data = $this->getRequest()->getPost('img');
        foreach ($data['data'] as $key => $value) {
            $categoryMedia = \Mage::getModel('model\category\Media');
            $categoryMedia->load($key, null);
            if (array_key_exists('banner', $value)) {
                if ($value['banner'] == 'on') {
                    $value['banner'] = 1;
                } else {
                    $value['banner'] = 0;
                }
            }

            $categoryMedia->SetData($value);
            $categoryMedia->Save();
        }
        array_shift($data);
        foreach ($data as $key => $value) {
            $categoryMedia = \Mage::getModel('model\category\Media');
            if ($value != []) {
                $id = $this->getRequest()->getGet('id');
                $query = "UPDATE `{$categoryMedia->getTableName()}` set $key=0 where `categoryId` = $id";
                $categoryMedia->getAdapter()->updateData($query);
                $categoryMedia->load($value);
                $categoryMedia->$key = 1;
                $categoryMedia->Save();
            }
        }
        $this->redirect('form', 'admin_category_Media', ["tab" => "media"], false);
    }

    public function deleteAction()
    {
        $data = $this->getRequest()->getPost('remove');
        $deleteId = [];
        foreach ($data as $id => $value) {
            $deleteId[] = $id;
            $imageModel = \Mage::getModel('model\category\Media');
            $collection = $imageModel->load($id);
            $name = $collection->image;
            unlink("Images\Category\\" . $name);
        }
        $imageModel = \Mage::getModel('model\category\media');
        $deleteId = implode(",", $deleteId);
        $query = "DELETE FROM `{$imageModel->getTableName()}` where `{$imageModel->getPrimaryKey()}` IN ({$deleteId})";
        $imageModel->getAdapter()->deleteData($query);
        $this->redirect('form', 'admin_category_Media', ["tab" => "media"], false);
    }

    public function statusAction()
    {
        $status = \Mage::getModel('model\category\media');
        $categoryId = $this->getRequest()->getGet('categoryId');
        if ($id = $this->getRequest()->getGet('id')) {
            $row = $status->load($id);
            if ($row->status == '0') {
                $status->status = '1';
                $status->imageId = $id;
                $status->save();
            } else {
                $status->status = '0';
                $status->imageId = $id;
                $status->save();
            }
        }
        $this->redirect('form', 'admin_category_Media', ["tab" => "media", 'id' => $categoryId], false);

    }
}
