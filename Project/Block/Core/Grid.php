<?php
namespace Block\Core;
/**
 *
 */
class Grid extends \Block\Core\Template
{
    protected $collection = null;
    protected $pager = null;
    protected $columns = [];
    protected $actions = [];
    protected $status = [];
    protected $buttons = [];
    protected $filters = [];
    protected $filterButton = [];

    public function __construct()
    {
        $this->setTemplate('core/grid.php');
        $this->prepareCollection();
        $this->prepareColumns();
        $this->prepareAction();
        $this->prepareButton();
        $this->prepareFilter();
        $this->prepareFilterButton();
    }

    public function getCollection()
    {
        if (!$this->collection) {
            $this->prepareCollection();
        }
        return $this->collection;
    }

    public function setCollection($collection)
    {
        $this->collection = $collection;

        return $this;
    }
    public function getPager()
    {
        if (!$this->pager) {
           return \Mage::getController('controller\Core\Pager');
        }
        return $this->pager;
    }
    public function setPager(\controller\Core\Pager $pager)
    {
        $this->pager = $pager;
    }

    public function prepareCollection()
    {
        return $this;
    }

    public function addButton($key, $value)
    {
        $this->buttons[$key] = $value;
        return $this;
    }

    public function getButtons()
    {
        return $this->buttons;
    }

    public function prepareButton()
    {
        return $this;
    }

    public function addColumn($key, $value)
    {
        $this->columns[$key] = $value;
        return $this;
    }

    public function prepareColumns()
    {
        return $this;
    }
    public function getColumns()
    {
        return $this->columns;
    }

    public function addAction($key, $value)
    {
        $this->actions[$key] = $value;
        return $this;
    }

    public function getActions()
    {
        return $this->actions;
    }

    public function prepareAction()
    {
        return $this;
    }

    public function addStatus($key, $value)
    {
        $this->status[$key] = $value;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function prepareStatus()
    {
        $this->addStatus('1', [
            'method' => 'getStatusUrl',
            'label' => 'Enable',
            'ajax' => true,
            'class' => 'btn btn-success',
        ]);
        $this->addStatus('0', [
            'method' => 'getStatusUrl',
            'label' => 'Disable',
            'ajax' => true,
            'class' => 'btn btn-danger',
        ]);
    }

    public function getMethodUrl($row, $method, $ajax = true)
    {
        return $this->$method($row, $ajax);
    }

    public function getButtonUrl($method, $ajax = true)
    {
        return $this->$method($ajax);
    }

    public function getFieldValue($row, $field)
    {
        return $row->$field;
    }
    public function getTitle()
    {
        return "Manage Module";
    }
    public function addFilterButton($key, $value)
    {
        $this->filterButton[$key] = $value;
    }
    public function getFilterButtons()
    {
        return $this->filterButton;
    }
    public function prepareFilter()
    {
        return $this;
    }
    public function getFilters()
    {
        return $this->filters;
    }
    public function addFilter($key, $value)
    {
        $this->filters[$key] = $value;
        return $this;
    }
    public function prepareFilterButton()
    {
        return $this;
    }
}
