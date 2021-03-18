<?php
namespace Block\Core\Edit;

use Block\Core\Template;

class Tabs extends Template
{
    protected $tableRow = null;
    public function __construct()
    {
        $this->setTemplate('Core\Edit\Tabs.php');
        $this->prepareTab();
    }
    public function getTableRow()
    {
        return $this->tableRow;
    }
    public function setTableRow($tableRow)
    {
        $this->tableRow = $tableRow;
        return $this;
    }

    public function prepareTab()
    {
        return $this;
    }
}
