<?php
namespace Controller\Admin\Product;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');

date_default_timezone_set('Asia/Calcutta');
/**
 * class for insert update and delete
 */
class Media extends \Controller\Core\Admin
{
    public function updateAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request..");
            }
            $data = $this->getRequest()->getPost('label');
            $label = '';
            foreach ($data['media'] as $key => $value) {
                $media = \Mage::getModel('Model\Product\Media');
                $small = $thumb = $base = $gallery = 0;
                if (array_key_exists('label', $value)) {
                    $label = $value['label'];
                }
                if (array_key_exists('small', $value)) {
                    $small = 1;
                }
                if (array_key_exists('thumb', $value)) {
                    $thumb = 1;
                }
                if (array_key_exists('base', $value)) {
                    $base = 1;
                }
                if (array_key_exists('gallery', $value)) {
                    $gallery = 1;
                }
                $id = $value['mediaId'];
                $query = "UPDATE `media`
								SET `label`= '$label',
									`small`='$small',
									`thumb`='$thumb',
									`base`='$base',
									`gallery`='$gallery'
								WHERE `mediaId` = '$id'";
                if ($media->update($query)) {
                    $message = \Mage::getModel('Model\Admin\Message');
                    $message->setSuccess('Record Saved Successfully...');
                } else {
                    $message = \Mage::getModel('Model\Admin\Message');
                    $message->setFailure('Unable to Save Record...');
                }
            }
            $this->redirect('form', 'Admin_Product');
        } catch (\Exception $e) {
            $message = \Mage::getModel('Model\Admin\Message');
            $message->setFailure($e->getMessage());
            $this->redirect('form', 'Admin_Product');
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

            $media = \Mage::getModel('Model\Product\Media');

            //delete image from folder
            $queryImage = "SELECT image FROM media where mediaId IN $ids";
            $rows = $media->all($queryImage);
            foreach ($rows->getData() as $key => $imageName) {

                foreach ($imageName->data as $value) {
                    unlink('skin/Admin/Images/Product/' . $value);
                }
            }
            $query = "DELETE FROM `media` WHERE `mediaId` in $ids";
            if ($media->deleteByQuery($query)) {
                $message = \Mage::getModel('Model\Admin\Message');
                $message->setSuccess('Record Deleted Successfully...');

                $id = $this->getRequest()->getGet('id');
                $query = "SELECT COUNT(mediaId) as 'records' FROM `media` WHERE `productId` = $id";
                $count = \Mage::getModel('Model\Product\Media');
                if ($count = $count->load(null, $query)->records == 1) {
                    $query = "UPDATE `media`
								SET
									`small`=1,
									`thumb`=1,
									`base`=1,
									`gallery`=1
								WHERE
									`productId` = '$id'";
                    $media = \Mage::getModel('Model\Product\Media');
                    $media->update($query);
                }
            }
            $this->redirect('form', 'Admin_Product');
        }

    }
    public function uploadAction()
    {
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_name = $_FILES['file']['name'];

        $newName = time() . "-" . rand(1000, 9999) . "-" . $file_name;
        $fileUploadPath = 'skin/Admin/Images/Product/' . $newName;
        move_uploaded_file($file_tmp, $fileUploadPath);

        $media = \Mage::getModel('Model\Product\Media');
        if ($id = $this->getRequest()->getGet('id')) {
            $media->productId = $id;
            $data['image'] = $newName;

            $query = "SELECT COUNT(mediaId) as 'records' FROM `media` WHERE `productId` = $id";
            $count = \Mage::getModel('Model\Product\Media');
            if ($count = $count->load(null, $query)->records == 0) {
                $media->small = 1;
                $media->thumb = 1;
                $media->base = 1;
                $media->gallery = 1;
            }
            $media->setData($data);
            $media->save();
        }
        $this->redirect('form', 'Admin_Product');
    }
}
