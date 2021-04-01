<?php

namespace Controller\Admin;

class Cart extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart())->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#content',
                    'html' => $grid,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }

    public function getCart($customerId = null)
    {
        $session = \Mage::getModel('Model\Admin\Session');
        if ($customerId) {
            $session->customerId = $customerId;
        }
        $cart = \Mage::getModel('Model\Cart');
        $query = "SELECT * FROM {$cart->getTableName()} WHERE `customerId` = '{$session->customerId}'";
        $cart = $cart->load(null, $query);

        if ($cart) {
            return $cart;
        }

        $cart = \Mage::getModel('Model\Cart');
        $cart->customerId = $session->customerId;
        $cart->createdDate = date("Y-m-d H:i:s");
        $cart->save();
        return $cart;
    }

    public function saveCustomerAction()
    {
        $customerId = $this->getRequest()->getPost('customer');

        $grid = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart($customerId['customerId']))->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#content',
                    'html' => $grid,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }

    public function addToCartAction()
    {
        $productId = $this->getRequest()->getGet('id');
        $product = \Mage::getModel('Model\Product')->load($productId);
        $this->getCart()->addItemToCart($product);
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart())->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#content',
                    'html' => $grid,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }

    public function updateCartAction()
    {
        $itemData = $this->getRequest()->getPost('item');
        foreach ($itemData as $cartItemId => $quantity) {
            if ($quantity != 0) {
                $item = \Mage::getModel('Model\Cart\Item')->load($cartItemId);
                $item->quantity = $quantity;
                $item->save();
            }
            if ($quantity == 0) {
                $this->deleteAction($cartItemId);
            }
        }
        $this->getMessage()->setSuccess('Cart update Successfully.');
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart())->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#content',
                    'html' => $grid,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }

    public function deleteAction($itemId = null)
    {
        $cartItem = \Mage::getModel('Model\Cart\Item');
        $cartItemId = $this->getRequest()->getGet('id');

        if ($itemId) {
            $cartItemId = $itemId;
        }
        $cartItem = $cartItem->load($cartItemId);
        if ($cartItem) {
            $cartItem->delete($cartItemId);
        }
        if ($itemId) {
            return true;
        } else {
            $grid = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart())->toHtml();
            $response = [
                'element' => [
                    [
                        'selector' => '#content',
                        'html' => $grid,
                    ],
                ],
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
        }
    }
}
