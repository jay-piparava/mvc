<?php
namespace Block\Admin\Attribute;

\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
    protected $attributes = null;

    public function __construct()
    {
        parent::__construct();

    }
    public function getTitle()
    {
        return "Attribute";
    }

    public function prepareCollection()
    {
        $attributes = \Mage::getModel('Model\Attribute');
        $filter = \Mage::getModel('Model\Admin\Filter');
        if ($filterValue = $filter->getFilter('attribute')) {
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
            $query = "SELECT * FROM `{$attributes->getTableName()}` $projection";
            $rows = $attributes->all($query);
            $this->setCollection($rows);
        } else {
            $rows = $attributes->all();
            $this->setCollection($rows);
        }

    }
    public function prepareButton()
    {
        $this->addButton('insert', [
            'method' => 'getInsertUrl',
            'label' => 'Add Attribute',
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
        $values = $filter->getFilter('attribute');

        $this->addfilter('attributeId', [
            'name' => 'filter[attribute][attributeId]',
            'style' => 'width:50px',
            'value' => $values['attributeId'],
            'placeholder' => 'Id',
        ]);
        $this->addfilter('entityTypeId', [
            'name' => 'filter[attribute][entityTypeId]',
            'style' => 'width:90px',
            'value' => $values['entityTypeId'],
            'placeholder' => 'Entity Type Id',
        ]);
        $this->addfilter('name', [
            'name' => 'filter[attribute][name]',
            'style' => 'width:70px',
            'value' => $values['name'],
            'placeholder' => 'Name',
        ]);
        $this->addfilter('code', [
            'name' => 'filter[attribute][code]',
            'style' => 'width:70px',
            'value' => $values['code'],
            'placeholder' => 'Code',
        ]);
        $this->addfilter('inputType', [
            'name' => 'filter[attribute][inputType]',
            'style' => 'width:90px',
            'value' => $values['inputType'],
            'placeholder' => 'Input Type',
        ]);
        $this->addfilter('backendType', [
            'name' => 'filter[attribute][backendType]',
            'style' => 'width:110px',
            'value' => $values['backendType'],
            'placeholder' => 'Backend Type',
        ]);
        $this->addfilter('setOrder', [
            'name' => 'filter[attribute][setOrder]',
            'style' => 'width:80px',
            'value' => $values['setOrder'],
            'placeholder' => 'Set Order',
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
        $this->addColumn('attributeid', [
            'field' => 'attributeId',
            'label' => '#',
            'type' => 'int',
        ]);
        $this->addColumn('entitytypeid', [
            'field' => 'entityTypeId',
            'label' => 'Entity Type',
            'type' => 'varchar',
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
        $this->addColumn('inputType', [
            'field' => 'inputType',
            'label' => 'Input Type',
            'type' => 'varchar',
        ]);
        $this->addColumn('backendtype', [
            'field' => 'backendType',
            'label' => 'Backend Type',
            'type' => 'varchar',
        ]);
        $this->addColumn('setorder', [
            'field' => 'setOrder',
            'label' => 'Set Order',
            'type' => 'int',
        ]);
        $this->addColumn('backendmodel', [
            'field' => 'backendModel',
            'label' => 'Backend Model',
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
            return "{$this->getUrl()->getUrl('edit', null, ['id' => $row->attributeId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('form', null, ['id' => $row->attributeId])}').resetParams().load()";
    }

    public function getDeleteUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('delete', null, ['id' => $row->attributeId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('delete', null, ['id' => $row->attributeId])}').resetParams().load()";
    }
    public function getStatusUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('status', null, ['id' => $row->attributeId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('status', null, ['id' => $row->attributeId])}').resetParams().load()";
    }
}
