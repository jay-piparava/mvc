<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');

date_default_timezone_set('Asia/Calcutta');
/**
 * class for insert update and delete
 */
class Brand extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getContent();
        $sidebar = $layout->getLeft();
    }

    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Brand\Grid')->toHtml();
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
    //function for save data
    public function uploadAction()
    {
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_name = $_FILES['file']['name'];

        $newName = time() . "-" . rand(1000, 9999) . "-" . $file_name;
        $fileUploadPath = 'Images/Brand/' . $newName;
        move_uploaded_file($file_tmp, $fileUploadPath);

        $brand = \Mage::getModel('Model\Brand');
        $data['image'] = $newName;
        $brand->setData($data);
        $brand->save();
        $this->redirect('gridHtml', null, [], true);
    }

    public function updateAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request..");
            }
            $data = $this->getRequest()->getPost('label');
            foreach ($data['brand'] as $key => $value) {
                $brand = \Mage::getModel('Model\Brand');
                if (array_key_exists('brandId', $value)) {
                    $brand->brandId = $value['brandId'];
                }
                if (array_key_exists('name', $value)) {
                    $brand->name = $value['name'];
                }
                if (array_key_exists('sortOrder', $value)) {
                    $brand->sortOrder = $value['sortOrder'];
                }
                $brand->save();
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
        $data = $this->getRequest()->getPost('remove');
        if ($data) {
            $delete = array_keys($data);
            $ids = '(';
            foreach ($delete as $value) {
                $ids .= $value . ',';
            }
            $ids = trim($ids, ',');
            $ids .= ')';
            $brand = \Mage::getModel('Model\Brand');

            //delete image from folder
            $queryImage = "SELECT image FROM brand where brandId IN $ids";
            $rows = $brand->all($queryImage);

            foreach ($rows->getData() as $key => $imageName) {

                foreach ($imageName->data as $value) {
                    unlink('Images/Brand/' . $value);
                }
            }
            $query = "DELETE FROM `brand` WHERE `brandId` in $ids";
            $brand->deleteByQuery($query);
            $this->redirect('gridHtml', null, [], true);
        }
    }
    public function statusAction()
    {
        $status = \Mage::getModel('Model\Brand');
        if ($id = $this->getRequest()->getGet('id')) {
            $row = $status->load($id);
            if ($row->status == '0') {
                $status->status = '1';
                $status->brandId = $id;
                $status->save();
            } else {
                $status->status = '0';
                $status->brandId = $id;
                $status->save();
            }
        }
        $this->redirect('gridHtml', null, null, true);
    }
}
