<?php $paymentMethods = $this->getPaymentMethods();?>
<?php $shippingMethods = $this->getShippingMethods();?>
<?php $billingAddress = $this->getBillingAddress();?>
<?php $shippingAddress = $this->getShippingAddress();?>
<?php $cart = $this->getCart();?>

<div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form action="" class='checkout' method="POST" enctype="multipart/form-data" novalidate>
                <table class="table" width=100%>
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="2" class="text-center">CheckOut Page</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <table border="1" class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="2" scope="col">Billing Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>First Name</td>
                                            <td><input name="billing1[firstName]" type="text" class="form-control" id="firstName" value="<?php echo $billingAddress->firstName ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td><input name="billing1[lastName]" class="form-control" id="lastName" value="<?php echo $billingAddress->lastName ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td><input name="billing[address]" type="text" class="form-control" id="address" value="<?php echo $billingAddress->address ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td><input name="billing[city]" class="form-control" id="city" value="<?php echo $billingAddress->city ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td><input name="billing[state]" class="form-control" id="state" value="<?php echo $billingAddress->state ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td><input name="billing[country]" class="form-control" id="country" value="<?php echo $billingAddress->country ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>ZipCode</td>
                                            <td><input name="billing[zipCode]" class="form-control" id="zipCode" value="<?php echo $billingAddress->zipCode ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a onclick="object.setForm('.checkout').setUrl('<?php echo $this->getUrl()->getUrl('saveBilling', 'admin_cart_checkOut') ?>').load()" class="btn btn-warning" href="javascript:void(0)">Save</a>
                                            </td>
                                            <td>
                                                <input class="ml-auto" name="bookAddressBilling" value="1" type="checkbox">
                                                <label for="save">save to address book</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table border="1" class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="2" scope="col">Shipping Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Same as Billing</td>
                                            <td><input value="1" name="sameAsBilling" type="checkbox"></td>
                                        </tr>
                                        <tr>
                                            <td>First Name</td>
                                            <td><input name="shipping1[firstName]" class="form-control" id="firstName" value="<?php echo $shippingAddress->firstName ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td><input name="shipping1[lastName]" class="form-control" id="lastName" value="<?php echo $shippingAddress->lastName ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td><input name="shipping[address]" type="text" class="form-control" id="address" value="<?php echo $shippingAddress->address ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td><input name="shipping[city]" class="form-control" id="city" value="<?php echo $shippingAddress->city ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td><input name="shipping[state]" class="form-control" id="state" value="<?php echo $shippingAddress->state ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td><input name="shipping[country]" class="form-control" id="country" value="<?php echo $shippingAddress->country ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>ZipCode</td>
                                            <td><input name="shipping[zipCode]" class="form-control" id="zipCode" value="<?php echo $shippingAddress->zipCode ?>" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a onclick="object.setForm('.checkout').setUrl('<?php echo $this->getUrl()->getUrl('saveShipping', 'admin_cart_checkOut') ?>').load()" class="btn btn-warning" href="javascript:void(0)">Save</a>
                                            </td>
                                            <td>
                                                <input class="ml-auto" name="bookAddressShipping" value="1" type="checkbox">
                                                <label for="save">save to address book</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table border="1" class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="2" scope="col">Payment Method</th>
                                        </tr>
                                        <tr>
                                            <td><b>Select</b></td>
                                            <td><b>Payment Method</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!$paymentMethods): ?>
                                            <tr>
                                                <td colspan="2">No Payment Method Available</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($paymentMethods->getData() as $paymentMethod): ?>
                                                <tr>
                                                    <td><input name="paymentMethod" type="radio" value="<?php echo $paymentMethod->methodId ?>" <?php if ($cart->paymentMethodId == $paymentMethod->methodId): ?> checked <?php endif;?>></td>
                                                    <td><?php echo $paymentMethod->name ?></td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                        <tr>
                                            <td colspan="2">
                                                <a onclick="object.setForm('.checkout').setUrl('<?php echo $this->getUrl()->getUrl('savePaymentMethod', 'admin_cart_checkOut') ?>').load()" class="btn btn-warning" href="javascript:void(0)">Save</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table border="1" class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="3" scope="col">Shipping Method</th>
                                        </tr>
                                        <tr>
                                            <td><b>Select</b></td>
                                            <td><b>Shipping Amount</b></td>
                                            <td><b>Amount (&nbsp;<i class="fa fa-inr" style="font-size:15px"></i>&nbsp;)</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!$shippingMethods): ?>
                                            <tr>
                                                <td colspan="2">No Payment Method Available</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($shippingMethods->getData() as $shippingMethod): ?>
                                                <tr>
                                                    <td><input name="shippingMethod" type="radio" value="<?php echo $shippingMethod->methodId ?>" <?php if ($cart->shippingMethodId == $shippingMethod->methodId): ?> checked <?php endif;?>></td>
                                                    <td><?php echo $shippingMethod->name ?></td>
                                                    <td><i class="fa fa-inr"></i>&nbsp;<?php echo $shippingMethod->amount ?>/-</td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                        <tr>
                                            <td colspan="3">
                                                <a onclick="object.setForm('.checkout').setUrl('<?php echo $this->getUrl()->getUrl('saveShippingMethod', 'admin_cart_checkOut') ?>').load()" class="btn btn-warning" href="javascript:void(0)">Save</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table border="2" class="table">
                                    <thead class="thead-light">
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Base Total(&nbsp;<i class="fa fa-inr" style="font-size:15px"></i>&nbsp;)</b></td>
                                            <td><i class="fa fa-inr"></i>&nbsp;<?php echo $this->getBaseTotal(); ?>/-</td>
                                        </tr>
                                        <tr>
                                            <td><b>Shipping Charges(&nbsp;<i class="fa fa-inr" style="font-size:15px"></i>&nbsp;)</b></td>
                                            <td><i class="fa fa-inr"></i>&nbsp;<?php echo $this->getShippingCharges(); ?>/-</td>
                                        </tr>
                                        <tr>
                                            <td><b>Grand Total(&nbsp;<i class="fa fa-inr" style="font-size:15px"></i>&nbsp;)</b></td>
                                            <td><b><i class="fa fa-inr"></i>&nbsp;<?php echo $this->getGrantTotal(); ?>/-</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function function1() {
        var elements = document.getElementsByClassName('disable');
        $(elements).each(function(i, element) {
            if (element.disabled) {
                // element.value = document.getElementById(element.id).value;
                element.disabled = false;
            } else {
                // element.value = document.getElementById(element.id).value;
                element.disabled = true;
            }
        })
    };
</script>