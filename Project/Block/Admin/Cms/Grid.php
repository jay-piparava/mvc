<?php
namespace Block\Admin\Cms;

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
        $cms = \Mage::getModel('Model\Cms');
        $filter = \Mage::getModel('Model\Admin\Filter');
        if ($filterValue = $filter->getFilter('cms')) {
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
            $query = "SELECT * FROM `{$cms->getTableName()}` $projection";
            $rows = $cms->all($query);
            $this->setCollection($rows);
        } else {
            $rows = $cms->all();
            $this->setCollection($rows);
        }
        return $this;
    }

    public function prepareButton()
    {
        $this->addButton('insert', [
            'method' => 'getInsertUrl',
            'label' => 'Insert Product',
            'ajax' => true,
            'class' => 'btn btn-primary',
        ]);
    }
    public function getTitle()
    {
        return "CMS";
    }
    public function prepareFilter()
    {
        $filter = \Mage::getModel('Model\Admin\Filter');
        $values = $filter->getFilter('cms');

        $this->addfilter('page', [
            'name' => 'filter[cms][pageId]',
            'style' => 'width:50px',
            'value' => $values['pageId'],
            'placeholder' => 'Id',
            'class' => 'clear',
        ]);
        $this->addfilter('title', [
            'name' => 'filter[cms][title]',
            'style' => 'width:70px',
            'value' => $values['title'],
            'placeholder' => 'Title',
            'class' => 'clear',
        ]);
        $this->addfilter('identifier', [
            'name' => 'filter[cms][identifier]',
            'style' => 'width:80px',
            'value' => $values['identifier'],
            'placeholder' => 'Identifier',
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
        $this->addColumn('pageid', [
            'field' => 'pageId',
            'label' => '#',
            'type' => 'int',
        ]);
        $this->addColumn('title', [
            'field' => 'title',
            'label' => 'Title',
            'type' => 'varchar',
        ]);
        $this->addColumn('identifier', [
            'field' => 'identifier',
            'label' => 'Identifier',
            'type' => 'varchar',
        ]);
        $this->addColumn('content', [
            'field' => 'content',
            'label' => 'Content',
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

    public function getStatusUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('status', null, ['id' => $row->pageId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('status', null, ['id' => $row->pageId])}').resetParams().load()";
    }

    public function getEditUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('edit', null, ['id' => $row->pageId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('form', null, ['id' => $row->pageId])}').resetParams().load()";
    }

    public function getDeleteUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('delete', null, ['id' => $row->pageId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('delete', null, ['id' => $row->pageId])}').resetParams().load()";
    }

    public function getInsertUrl($ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('form', 'null', [], true)}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('form', null, [], true)}').resetParams().load()";
    }
    protected function setCms($cms = null)
    {
        if ($this->cms) {
            $this->cms = $cms;
        }
        if (!$cms) {

        }
        return $this;
    }
    public function getCms()
    {
        if (!$this->cms) {
            $this->setCms();
        }
        return $this->cms;
    }
}
