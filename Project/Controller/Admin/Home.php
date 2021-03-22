<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller/Core/Admin');
/**
 *
 */
class Home extends \Controller\Core\Admin
{
    public function homeAction()
    {
        $home = \Mage::getBlock('Block\Admin\Home\Home');
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $content->addchild($home, 'home');
        echo $layout->tohtml();
    }
}
