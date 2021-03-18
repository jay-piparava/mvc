<?php
namespace Model\Product;

\Mage::LoadFileByClassName('Model\Core\Table');
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
