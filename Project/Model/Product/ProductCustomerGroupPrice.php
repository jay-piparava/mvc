<?php
namespace Model\Product;

/**
 *
 */
class ProductCustomerGroupPrice extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey('groupPriceId');
        $this->setTableName('product_customer_group_price');
    }
}
