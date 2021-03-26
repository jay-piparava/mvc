<?php
namespace Block\Admin\CustomerGroup;

/**
 *
 */
class Grid extends \Block\Core\Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->prepareStatus();
    }

    public function prepareCollection()
    {
        $pager = \Mage::getController('Controller\Core\Pager');
        $count = \Mage::getModel('Model\Customer\CustomerGroup');
        $rows = $count->all();
        $count = \count($rows->data);
        // print_r($rows);
        // $count = $rows->countData();

        $pager->setTotalRecords($count);
        $pager->setRecordsPerPage(5);
        $pager->setCurrentPage($this->getRequest()->getGet('page', 1));
        $startFrom = ($pager->getCurrentPage() - 1) * $pager->getRecordsPerPage();
        $pager->calculate();
        $this->setPager($pager);

        $customerGroups = \Mage::getModel('Model\Customer\CustomerGroup');
        $filter = \Mage::getModel('Model\Admin\Filter');
        if ($filterValue = $filter->getFilter('customerGroup')) {
            $filedName = array_keys($filterValue);
            $values = array_values($filterValue);
            $projection = 'WHERE';
            foreach ($filedName as $key => $value) {
                if ($values[$key]) {
                    $projection .= "`$filedName[$key]` = '$values[$key]' AND ";
                }
            }
            if ($projection == 'WHERE') {
                $projection = '';

            } else {

                $words = explode(" ", $projection);
                array_splice($words, -2);
                $projection = implode(" ", $words);
            }
            $query = "SELECT * FROM `{$customerGroups->getTableName()}` $projection";
            $rows = $customerGroups->all($query);
            if ($rows) {
                $count = \count($rows->data);
            } else {
                $count = 0;
                $pager->setCurrentPage(1);
            }

            $pager->setTotalRecords($count);
            $startFrom = ($pager->getCurrentPage() - 1) * $pager->getRecordsPerPage();
            $pager->calculate();

            $query = "SELECT * FROM `{$customerGroups->getTableName()}` $projection LIMIT $startFrom ,{$pager->getRecordsPerPage()}";
            $rows = $customerGroups->all($query);
            $this->setCollection($rows);
        } else {
            $query = "SELECT * FROM `{$customerGroups->getTableName()}` LIMIT $startFrom ,{$pager->getRecordsPerPage()}";
            $rows = $customerGroups->all($query);
            $this->setCollection($rows);
        }

    }
    public function prepareFilter()
    {
        $filter = \Mage::getModel('Model\Admin\Filter');
        $values = $filter->getFilter('customerGroup');

        $this->addfilter('groupId', [
            'name' => 'filter[customerGroup][groupId]',
            'style' => 'width:50px',
            'value' => $values['groupId'],
            'placeholder' => 'Id',
            'class' => 'clear',
        ]);
        $this->addfilter('name', [
            'name' => 'filter[customerGroup][name]',
            'style' => 'width:70px',
            'value' => $values['name'],
            'placeholder' => 'Name',
            'class' => 'clear',
        ]);
    }
    public function prepareFilterButton()
    {
        $this->addFilterButton('0', [
            'label' => 'Apply Filter',
            'method' => 'applyFilter',
            'ajax' => true,
            'class' => 'btn btn-primary',
        ]);
    }
    public function prepareColumns()
    {
        $this->addColumn('groupId', [
            'field' => 'groupId',
            'label' => '#',
            'type' => 'int',
        ]);
        $this->addColumn('name', [
            'field' => 'name',
            'label' => 'Type',
            'type' => 'varchar',
        ]);
    }
    public function prepareAction()
    {
        $this->addAction('edit', [
            'method' => 'getEditUrl',
            'label' => 'Edit',
            'ajax' => true,
            'class' => 'btn btn-warning',
        ]);
        $this->addAction('delete', [
            'method' => 'getDeleteUrl',
            'label' => 'Delete',
            'ajax' => true,
            'class' => 'btn btn-danger',
        ]);
    }
    public function prepareButton()
    {
        $this->addButton('insert', [
            'method' => 'getInsertUrl',
            'label' => 'Add Customer Group',
            'ajax' => true,
            'class' => 'btn btn-primary',
        ]);
    }
    public function getStatusUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('status', null, ['id' => $row->groupId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('status', null, ['id' => $row->groupId])}').resetParams().load()";
    }
    public function getInsertUrl($ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('form', 'null', [], true)}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('form', null, [], true)}').resetParams().load()";
    }
    public function getEditUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('edit', 'Admin_CustomerGroup', ['id' => $row->groupId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('form', 'Admin_CustomerGroup', ['id' => $row->groupId])}').resetParams().load()";
    }

    public function getDeleteUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('delete', 'Admin_CustomerGroup', ['id' => $row->groupId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('delete', 'Admin_CustomerGroup', ['id' => $row->groupId])}').resetParams().load()";
    }
    public function getTitle()
    {
        return "Customer Type";
    }

}
