<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName('Block\Core\Template');
/**
 *
 */
class Grid extends \Block\Core\Template
{
    protected $admins;

    public function __construct()
    {
        $this->setTemplate('Admin/Admin/gridAdmin.php');
    }
    protected function setAdmins($admins = null)
    {
        if ($this->admins) {
            $this->admins = $admins;
        }
        if (!$admins) {
            $admins = \Mage::getModel('Model\Admin');
            $rows = $admins->all();
            $this->admins = $rows;
        }
        return $this;
    }
    public function getAdmins()
    {
        if (!$this->admins) {
            $this->setAdmins();
        }
        return $this->admins;
    }
}
