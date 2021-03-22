<?php
namespace Controller\Core;

\Mage::loadFileByClassName('Block\Core\Layout');
\Mage::loadFileByClassName('Controller\Core\Abstracts');

/**
 *
 */
class Admin extends Abstracts
{
    protected $layout = null;
    protected $message = null;

    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if (!$layout) {
            $layout = \Mage::getController('Block\Admin\Layout');
        }
        $this->layout = $layout;
        return $this;
    }

    public function setMessage(\Model\Core\Message $message = null)
    {
        if (!$message) {
            $message = \Mage::getModel('Model\Admin\Message');
        }
        $this->message = $message;
        return $this;
    }

}
