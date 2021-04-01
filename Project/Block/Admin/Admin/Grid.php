<?php
namespace Block\Admin\Admin;

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
        $admins = \Mage::getModel('Model\Admin');
        $filter = \Mage::getModel('Model\Admin\Filter');

        if ($filterValue = $filter->getFilter('admins')) {
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

            $query = "SELECT * FROM `{$admins->getTableName()}` $projection ";
            $rows = $admins->all($query);
            $this->setCollection($rows);
        } else {
            $query = "SELECT * FROM `{$admins->getTableName()}`";
            $rows = $admins->all($query);
            $this->setCollection($rows);
        }
    }
    public function prepareButton()
    {
        $this->addButton('insert', [
            'method' => 'getInsertUrl',
            'label' => 'Add Admin',
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

    public function prepareFilter()
    {
        $filter = \Mage::getModel('Model\Admin\Filter');
        $values = $filter->getFilter('admins');

        $this->addfilter('adminId', [
            'name' => 'filter[admin][adminId]',
            'style' => 'width:50px',
            'value' => $values['adminId'],
            'placeholder' => 'Id',
            'class' => 'clear',
        ]);
        $this->addfilter('username', [
            'name' => 'filter[admin][userName]',
            'style' => 'width:90px',
            'value' => $values['userName'],
            'placeholder' => 'User Name',
            'class' => 'clear',
        ]);
        $this->addfilter('password', [
            'name' => 'filter[admin][password]',
            'style' => 'width:90px',
            'value' => $values['password'],
            'placeholder' => 'Password',
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
        $this->addColumn('admminid', [
            'field' => 'adminId',
            'label' => '#',
            'type' => 'int',
        ]);
        $this->addColumn('uname', [
            'field' => 'userName',
            'label' => 'User Name',
            'type' => 'varchar',
        ]);
        $this->addColumn('password', [
            'field' => 'password',
            'label' => 'PassWord',
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
    public function getTitle()
    {
        return "Admin";
    }
    public function getEditUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('edit', null, ['id' => $row->adminId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('form', null, ['id' => $row->adminId])}').resetParams().load()";
    }
    public function getDeleteUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('delete', null, ['id' => $row->adminId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('delete', null, ['id' => $row->adminId])}').resetParams().load()";
    }
    public function getStatusUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('status', null, ['id' => $row->adminId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('status', null, ['id' => $row->adminId])}').resetParams().load()";
    }

}
