<?php
namespace Block\Core;

use Block\Core\Template;

class Edit extends Template
{
    protected $tab = null;
    protected $tableRow = null;
    protected $tabClass = null;
    public function __construct()
    {
        $this->setTemplate('core/edit.php');
    }
    public function getTabContent()
    {
        $tab = $this->getTab();
        $tabs = $tab->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tab->getDefaultTab());
        if (!array_key_exists($tab, $tabs)) {
            return null;
        }
        $blockClassName = $tabs[$tab]['block'];
        $block = \Mage::getBlock($blockClassName);
        $block->setTableRow($this->getTableRow());
        echo $block->toHtml();
    }
    public function getTab()
    {
        if (!$this->tab) {
            $this->setTab();
        }
        return $this->tab;
    }

    public function setTab($tab = null)
    {
        if (!$tab) {
            $tab = $this->getTAbClass();
        }
        $tab->setTableRow($this->getTableRow());
        $this->tab = $tab;
        return $this;
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

    public function getTabHtml()
    {
        return $this->getTab()->toHtml();
    }

    public function getTabClass()
    {
        return $this->tabClass;
    }

    public function setTabClass($tabClass = null)
    {
        $this->tabClass = $tabClass;

        return $this;
    }
}
