<?php
namespace Block\Admin\Product;

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
        $pager->setCurrentPage($this->getRequest()->getGet('page', 1));
        $startFrom = ($pager->getCurrentPage() - 1) * $pager->getRecordsPerPage();
        $pager->calculate();
        $this->setPager($pager);

        $product = \Mage::getModel('Model\Product');
        $filter = \Mage::getModel('Model\Admin\Filter');
        if ($filterValue = $filter->getFilter('product')) {

            $filedName = array_keys($filterValue);
            $values = array_values($filterValue);
            $projection = '';
            foreach ($filedName as $key => $value) {
                if ($values[$key]) {
                    $projection .= "`$filedName[$key]` = '$values[$key]' AND ";
                }

            }
            if ($projection) {
                $projection = rtrim($projection, ',');
                $words = explode(" ", $projection);
                array_splice($words, -2);
                $projection = implode(" ", $words);
            }

            if ($projection) {
                $query = "select p.*,b.bname as `brandName` from product p join brand b on p.brandId=b.brandId where $projection";
                $rows = $product->all($query);
                $count = $rows->countData();
                $pager->setTotalRecords($count);
                $startFrom = ($pager->getCurrentPage() - 1) * $pager->getRecordsPerPage();
                $pager->calculate();
                $query = "select p.*,b.bname as `brandName` from product p join brand b on p.brandId=b.brandId where $projection LIMIT $startFrom,{$pager->getRecordsPerPage()}";
            } else {
                $query = "select p.*,b.bname as `brandName` from product p join brand b on p.brandId=b.brandId";
                $rows = $product->all($query);
                $count = $rows->countData();
                $pager->setTotalRecords($count);
                $startFrom = ($pager->getCurrentPage() - 1) * $pager->getRecordsPerPage();
                $pager->calculate();
                $query = "select p.*,b.bname as `brandName` from product p join brand b on p.brandId=b.brandId LIMIT $startFrom,{$pager->getRecordsPerPage()}";
            }
            $row = $product->all($query);
            $this->setCollection($row);
        } else {
            $query = "select p.*,b.bname as `brandName` from product p join brand b on p.brandId=b.brandId LIMIT $startFrom,{$pager->getRecordsPerPage()}";
            $rows = $product->all($query);
            $this->setCollection($rows);
        }
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
        $filter = \Mage::getModel('Model\Admin\Filter');
        $values = $filter->getFilter('product');

        $this->addfilter('method', [
            'name' => 'filter[product][productId]',
            'style' => 'width:50px',
            'value' => $values['productId'],
            'placeholder' => 'Id',
            'class' => 'clear',
        ]);
        $this->addfilter('brandName', [
            'name' => 'filter[product][bname]',
            'style' => 'width:70px',
            'value' => $values['bname'],
            'placeholder' => 'Brand',
            'class' => 'clear',
        ]);
        $this->addfilter('name', [
            'name' => 'filter[product][name]',
            'style' => 'width:70px',
            'value' => $values['name'],
            'placeholder' => 'Name',
            'class' => 'clear',
        ]);
        $this->addfilter('price', [
            'name' => 'filter[product][price]',
            'style' => 'width:70px',
            'value' => $values['price'],
            'placeholder' => 'Price',
            'class' => 'clear',
        ]);
        $this->addfilter('discount', [
            'name' => 'filter[product][discount]',
            'style' => 'width:70px',
            'value' => $values['discount'],
            'placeholder' => 'Discount',
            'class' => 'clear',
        ]);
        $this->addfilter('Quantity', [
            'name' => 'filter[product][quantity]',
            'style' => 'width:70px',
            'value' => $values['quantity'],
            'placeholder' => 'Quantity',
            'class' => 'clear',
        ]);

        // $this->addfilter('discount', [
        //     'inputType' => "<input type='text'style='width:70px' name='filter[product][discount]' placeholder='Discount'>",
        // ]);
        // $this->addfilter('Quantity', [
        //     'inputType' => "<input type='text' style='width:70px' name='filter[product][quantity]' placeholder='Quantity'>",
        // ]);
        // $this->addfilter('sku', [
        //     'inputType' => "<input type='text' style='width:70px' name='filter[product][sku]' placeholder='Sku'>",
        // ]);
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
        return "Product";
    }
    public function prepareColumns()
    {
        $this->addColumn('productid', [
            'field' => 'productId',
            'label' => '#',
            'type' => 'int',
        ]);
        $this->addColumn('brandid', [
            'field' => 'brandName',
            'label' => 'Brand',
            'type' => 'int',
        ]);
        $this->addColumn('name', [
            'field' => 'name',
            'label' => 'Name',
            'type' => 'varchar',
        ]);
        $this->addColumn('price', [
            'field' => 'price',
            'label' => 'Price',
            'type' => 'decimal',
        ]);
        $this->addColumn('discount', [
            'field' => 'discount',
            'label' => 'Discount',
            'type' => 'decimal',
        ]);
        $this->addColumn('quantity', [
            'field' => 'quantity',
            'label' => 'Quantity',
            'type' => 'int',
        ]);
        $this->addColumn('sku', [
            'field' => 'sku',
            'label' => 'Sku',
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
            return "{$this->getUrl()->getUrl('status', 'Admin_Product', ['id' => $row->productId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('status', 'Admin_Product', ['id' => $row->productId])}').resetParams().load()";
    }

    public function getEditUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('edit', 'Admin_Product', ['id' => $row->productId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('form', 'Admin_Product', ['id' => $row->productId])}').resetParams().load()";
    }

    public function getDeleteUrl($row, $ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('delete', 'Admin_Product', ['id' => $row->productId])}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('delete', 'Admin_Product', ['id' => $row->productId])}').resetParams().load()";
    }

    public function getInsertUrl($ajax)
    {
        if (!$ajax) {
            return "{$this->getUrl()->getUrl('form', 'null', [], true)}";
        }
        return "object.setUrl('{$this->getUrl()->getUrl('form', null, [], true)}').resetParams().load()";
    }

}
