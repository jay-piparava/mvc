<?php $customers = $this->getCustomers();?>
<?php $cart = $this->getCart();?>
<?php $items = $this->getCart()->getItems();?>
<?php $customer = $cart->getCustomer();?>
<div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form action="" class='cartGrid' method="POST" enctype="multipart/form-data" novalidate>
                <table class='table'>
                    <thead>
                        <tr class='text-right'>
                            <th colspan="3" valign="center">
                                <label for="title">Select Customer</label>
                                <?php if (!$customers): ?>
                                    <b>No Customers</b>
                                <?php else: ?>
                                    <select name="customer[customerId]" id="">
                                        <option value="0">Select Customer</option>
                                        <?php foreach ($customers->getData() as $value): ?>
                                            <option value="<?php echo $value->customerId; ?>" <?php if ($customer): ?><?php if ($value->customerId == $customer->customerId): ?> selected <?php endif;?> <?php endif;?>><?php echo $value->firstName ?></option>
                                        <?php endforeach;?>
                                    </select>
                                <?php endif;?>
                                <a onclick="object.setForm('.cartGrid').setUrl('<?php echo $this->getGoUrl(); ?>').load();" href="javascript:void(0)" class="btn btn-sm btn-primary">Go</a>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="3"><a onclick="object.setForm('.cartGrid').setUrl('<?php echo $this->getUpdateCartUrl(); ?>').load();" href="javascript:void(0)" class="btn btn-sm btn-success">Update</a></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Produc Id</th>
                                            <th scope="col">Quentity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Row Total</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Final Total</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!$items): ?>
                                            <tr>
                                                <td colspan="8" >No Items In Cart</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($items->getData() as $item): ?>
                                                <tr>
                                                    <td><?php echo $item->cartItemId ?></td>
                                                    <td><?php echo $item->productId ?></td>
                                                    <td><input type="number" name="item[<?php echo $item->cartItemId ?>]" value="<?php echo $item->quantity ?>" min=0></td>
                                                    <td><?php echo $item->basePrice ?></td>
                                                    <td><?php echo $item->quantity * $item->basePrice ?></td>
                                                    <td><?php echo $item->quantity * $item->discount ?></td>
                                                    <td><?php echo ($item->quantity * $item->basePrice) - ($item->quantity * $item->discount) ?></td>
                                                    <th>
                                                        <a onclick="object.setUrl('<?php echo $this->getDeleteUrl($item->cartItemId); ?>').load();" href="javascript:void(0)" class="btn btn-sm btn-danger">Delete</a>
                                                    </th>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </thead>
                </table>
            </form>
            <div>
                <a onclick="object.setUrl('<?php echo $this->getProcessToPayUrl(); ?>').load();" href="javascript:void(0)" class="btn btn-sm btn-primary">Process To CheckOut</a>
            </div>
        </div>
    </div>
</div>