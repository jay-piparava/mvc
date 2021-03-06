<?php
namespace Controller\Core;

/**
 *
 */
class Customer extends Abstracts
{
    protected $layout = null;
    protected $message = null;

    public function setLayout($layout = null)
    {
        if (!$layout) {
            $layout = \Mage::getModel('Block\Customer\Layout');
        }
        $this->layout = $layout;
        return $this;
    }

    public function setMessage($message = null)
    {
        if (!$message) {
            $message = \Mage::getModel('Model\Customer\Message');
        }
        $this->message = $message;
        return $this;
    }

}
