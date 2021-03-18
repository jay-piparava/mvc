<?php
namespace Controller\Admin\Customer;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Controller\Core\Admin');

date_default_timezone_set('Asia/Calcutta');
/**
 * class for insert update and delete
 */
class Address extends \Controller\Core\Admin
{

    public function saveAction()
    {
        if ($tab = $this->getRequest()->getGet('tab')) {

            $billing = \Mage::getModel('model\Customer\Address');
            $shipping = \Mage::getModel('model\Customer\Address');

            $billingData = $this->getRequest()->getPost('billing');
            if ($billingData) {
                $billing->setData($billingData);
                $billing->Save();
            }

            $shippingData = $this->getRequest()->getPost('shipping');
            if ($shippingData) {
                $shipping->setData($shippingData);
                $shipping->Save();
            }
            $this->redirect('form', 'Admin_customer');
        }
    }
}
