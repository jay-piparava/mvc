<?php
namespace Controller;


class Home extends Core\Customer
{
    public function homeAction()
    {
        $layout = $this->getLayout();
        // $content = $layout->getChild('content');
        echo $layout->toHtml();
    }
}
