<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName('Block\Core\Grid');
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
        $rows = $admins->all();
        $this->setCollection($rows);
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
