<?php
namespace Block\Admin\Shiping;

/**
 *
 */
class Grid extends \Block\Core\Grid
{
    protected $shippings;

    public function __construct()
    {
        parent::__construct();
        $this->prepareStatus();
    }
    public function getTitle()
    {
        return "Shiping";
    }
    public function prepareCollection()
    {
        $shipping = \Mage::getModel('Model\Shiping');
        $filter = \Mage::getModel('Model\Admin\Filter');
        if ($filterValue = $filter->getFilter('shiping')) {
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
            $query = "SELECT * FROM `{$shipping->getTableName()}` $projection";
            $rows = $shipping->all($query);
            $this->setCollection($rows);
        } else {
            $rows = $shipping->all();
            $this->setCollection($rows);

        }

    }
    public function prepareFilter()
    {
        $filter = \Mage::getModel('Model\Admin\Filter');
        $values = $filter->getFilter('shiping');

        $this->addfilter('method', [
            'name' => 'filter[shiping][methodId]',
            'style' => 'width:50px',
            'value' => $values['methodId'],
            'placeholder' => 'Id',
        ]);
        $this->addfilter('name', [
            'name' => 'filter[shiping][name]',
            'style' => 'width:50px',
            'value' => $values['name'],
            'placeholder' => 'Name',
        ]);
        $this->addfilter('code', [
            'name' => 'filter[shiping][code]',
            'style' => 'width:70px',
            'value' => $values['code'],
            'placeholder' => 'Code',
        ]);
        $this->addfilter('desc', [
            'name' => 'filter[shiping][amount]',
            'style' => 'width:90px',
            'value' => $values['amount'],
            'placeholder' => 'Amount',
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
    public function prepareButton()
    {
        $this->addButton('insert', [
            'method' => 'getInsertUrl',
            'label' => 'Add Shipping',
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
        $this->addColumn('methodId', [
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
        $this->addColumn('amount', [
            'field' => 'amount',
            'label' => 'Amount',
            'type' => 'varchar',
        ]);
        $this->addColumn('description', [
            'field' => 'discription',
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
