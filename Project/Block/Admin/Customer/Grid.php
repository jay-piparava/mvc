<?php
namespace Block\Admin\Customer;

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
        $count = \Mage::getModel('Model\Customer');
        $rows = $count->all();
        $count = $rows->countData();

        $pager->setTotalRecords($count);
        $pager->setRecordsPerPage(5);
        $pager->setCurrentPage($this->getRequest()->getGet('page', 1));
        $startFrom = ($pager->getCurrentPage() - 1) * $pager->getRecordsPerPage();
        $pager->calculate();
        $this->setPager($pager);
        $customer = \Mage::getModel('Model\Customer');
        $query = "SELECT
							c.`customerId`,
							c.`firstName`,
							c.`lastName`,
							c.`email`,
							c.`mobile`,
							c.`password`,
							c.`status`,
							cg.`name`
						FROM `customer` AS c , `customer_group` AS cg
						WHERE c.`groupId` = cg.`groupId` LIMIT $startFrom,{$pager->getRecordsPerPage()}";
        $rows = $customer->all($query);
        $this->setCollection($rows);
        return $this;

    }
    public function getTitle()
    {
        return "Customer";
    }
    public function prepareColumns()
    {
        $this->addColumn('customerId', [
            'field' => 'customerId',
            'label' => '#',
            'type' => 'int',
        ]);
        $this->addColumn('firstName', [
            'field' => 'firstName',
            'label' => 'First Name',
            'type' => 'varchar',
        ]);
        $this->addColumn('lastName', [
            'field' => 'lastName',
            'label' => 'Last Name',
            'type' => 'varchar',
        ]);
        $this->addColumn('customerType', [
            'field' => 'name',
            'label' => 'Customer Type',
            'type' => 'varchar',
        ]);
        $this->addColumn('email', [
            'field' => 'email',
            'label' => 'Email',
            'type' => 'varchar',
        ]);
        $this->addColumn('mobile', [
            'field' => 'mobile',
            'label' => 'Mobile No.',
            'type' => 'int',
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
            'label' => 'Add Customer',
            'ajax' => true,
            'class' => 'btn btn-primary',
        ]);
    }

    public function getInsertUrl($ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('edit', 'Admin_Customer', ['id' => $row->customerId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('form', 'Admin_Customer', [], true)}').resetParams().load()";
    }

    public function getStatusUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('status', 'Admin_Customer', ['id' => $row->customerId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('status', 'Admin_Customer', ['id' => $row->customerId])}').resetParams().load()";
    }
    public function getEditUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('edit', 'Admin_Customer', ['id' => $row->customerId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('form', 'Admin_Customer', ['id' => $row->customerId])}').resetParams().load()";
    }

    public function getDeleteUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('delete', 'Admin_Customer', ['id' => $row->customerId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('delete', 'Admin_Customer', ['id' => $row->customerId])}').resetParams().load()";
    }

}
