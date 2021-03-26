<?php
namespace Block\Admin\Product\Edit\Tabs;

/**
 *
 */
class GroupPrice extends \Block\Core\Edit
{
    protected $customerGroupPrice = null;

    public function __construct()
    {
        $this->setTemplate('Admin/Product/Edit/Tabs/groupPrice.php');
    }
    public function setCustomerGroupPrice()
    {
        $customerGroupPrice = \Mage::getModel('Model\Product\ProductCustomerGroupPrice');
        $productId = $this->getRequest()->getGet('id');
        $query = "SELECT `cg`.*,`pcgp`.`price`,`p`.`productId`,`p`.`price` AS `productPrice`,`p`.`name` AS `productName` ,`p`.`sku`,`pcgp`.`groupPriceId`
					FROM customer_group cg
					LEFT JOIN product_customer_group_price as `pcgp`
						ON `pcgp`.`groupId` = `cg`.`groupId` AND `pcgp`.`productId` = '{$productId}'
						LEFT JOIN  product as `p`
							ON `p`.`productId` = '{$productId}'
				";
        $this->customerGroupPrice = $customerGroupPrice->all($query);
    }

    public function getCustomerGroupPrice()
    {
        if (!$this->customerGroupPrice) {
            $this->setCustomerGroupPrice();
        }
        return $this->customerGroupPrice;
    }
}
