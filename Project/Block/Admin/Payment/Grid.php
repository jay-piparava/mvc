<?php
namespace Block\Admin\Payment;

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
        $count = \Mage::getModel('Model\Payment');
        $rows = $count->all();
        $count = $rows->countData();

        $pager->setTotalRecords($count);
        $pager->setRecordsPerPage(5);
        $pager->setCurrentPage($_GET['page']);
        $startFrom = ($pager->getCurrentPage() - 1) * $pager->getRecordsPerPage();
        $pager->calculate();
        $this->setPager($pager);
        $payments = \Mage::getModel('Model\Payment');
        $filter = \Mage::getModel('Model\Admin\Filter');

        if ($filterValue = $filter->getFilter('payment')) {
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
            $query = "SELECT * FROM `{$payments->getTableName()}` $projection";
            $rows = $payments->all($query);
            $count = $rows->countData();
            $pager->setTotalRecords($count);
            $startFrom = ($pager->getCurrentPage() - 1) * $pager->getRecordsPerPage();
            $pager->calculate();
            $query = "SELECT * FROM `{$payments->getTableName()}` $projection LIMIT $startFrom,{$pager->getRecordsPerPage()}";
            $rows = $payments->all($query);
            $this->setCollection($rows);
        } else {
            $query = "SELECT * FROM `{$payments->getTableName()}` LIMIT $startFrom ,{$pager->getRecordsPerPage()}";
            $rows = $payments->all($query);
            $this->setCollection($rows);
        }
    }
    public function getTitle()
    {
        return "Payment";
    }
    public function prepareButton()
    {
        $this->addButton('insert', [
            'method' => 'getInsertUrl',
            'label' => 'Add payment',
            'ajax' => true,
            'class' => 'btn btn-primary',
        ]);
    }
    public function getInsertUrl($ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('form', 'null', [], true)}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('form', null, [], true)}').resetParams().load()";
    }
    public function prepareColumns()
    {
        $this->addColumn('paymentId', [
            'field' => 'methodId',
            'label' => '#',
            'type' => 'int',
        ]);
        $this->addColumn('name', [
            'field' => 'name',
            'label' => 'Name',
            'type' => 'varchar',
        ]);
        $this->addColumn('code', [
            'field' => 'code',
            'label' => 'Code',
            'type' => 'varchar',
        ]);
        $this->addColumn('description', [
            'field' => 'description',
            'label' => 'Description',
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
    public function prepareFilter()
    {
        $filter = \Mage::getModel('Model\Admin\Filter');
        $values = $filter->getFilter('payment');

        $this->addfilter('method', [
            'name' => 'filter[payment][methodId]',
            'style' => 'width:50px',
            'value' => $values['methodId'],
            'placeholder' => 'Id',
            'class' => 'clear',
        ]);
        $this->addfilter('name', [
            'name' => 'filter[payment][name]',
            'style' => 'width:50px',
            'value' => $values['name'],
            'placeholder' => 'Name',
            'class' => 'clear',
        ]);
        $this->addfilter('code', [
            'name' => 'filter[payment][code]',
            'style' => 'width:70px',
            'value' => $values['code'],
            'placeholder' => 'Code',
            'class' => 'clear',
        ]);
        $this->addfilter('desc', [
            'name' => 'filter[payment][description]',
            'style' => 'width:90px',
            'value' => $values['description'],
            'placeholder' => 'Description',
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
    public function getEditUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('edit', null, ['id' => $row->methodId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('form', null, ['id' => $row->methodId])}').resetParams().load()";
    }

    public function getDeleteUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('delete', null, ['id' => $row->methodId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('delete', null, ['id' => $row->methodId])}').resetParams().load()";
    }
    public function getStatusUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('status', null, ['id' => $row->methodId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('status', null, ['id' => $row->methodId])}').resetParams().load()";
    }
}
