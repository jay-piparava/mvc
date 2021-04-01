<?php $billing = $this->getBilling();?>
<?php $shipping = $this->getShipping();?>

<p class="h2 text-center">Billing Address</p><br>
<?php if ($billing->addressId): ?>
    <input type="hidden" name="billing[addressId]" value="<?php echo $billing->addressId; ?>">
<?php endif?>
<input type="hidden" name="billing[customerId]" value="<?php echo $this->getRequest()->getGet('id'); ?>">
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="address">Address</label>
        <textarea name="billing[address]" cols="10" rows="3" class="form-control" placeholder="Enter Address"><?php echo $billing->address; ?></textarea>
    </div>
    <div class="form-group col-md-6">
        <label for="city">City</label>
        <input type="text" name="billing[city]" class="form-control" placeholder="City" value="<?php echo $billing->city; ?>">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="sku">State</label>
        <input type="text" name="billing[state]" class="form-control" placeholder="State" value="<?php echo $billing->state; ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="name">Zip Code</label>
        <input type="number" name="billing[zipCode]" class="form-control" placeholder="Zip Code" value="<?php echo $billing->zipCode; ?>">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="price">Country</label>
        <input type="text" name="billing[country]" class="form-control" placeholder="Country" value="<?php echo $billing->country; ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="name">Address Type</label>
        <input type="text" name="billing[addressType]" class="form-control" readonly placeholder="Address Type" value="billing">
    </div>
</div>

<?php if ($shipping->addressId): ?>
    <input type="hidden" name="shipping[addressId]" value="<?php echo $shipping->addressId; ?>">
<?php endif?>
<p class="h2 text-center">Shipping Address</p><br>
<div class="form-row">
    <input type="hidden" name="shipping[customerId]" value="<?php echo $this->getRequest()->getGet('id'); ?>">
    <div class="form-group col-md-6">
        <label for="address">Address</label>
        <textarea name="shipping[address]" cols="10" rows="3" class="form-control" placeholder="Enter Address"><?php echo $shipping->address; ?></textarea>
    </div>
    <div class="form-group col-md-6">
        <label for="city">City</label>
        <input type="text" name="shipping[city]" class="form-control" placeholder="City" value="<?php echo $shipping->city; ?>">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="sku">State</label>
        <input type="text" name="shipping[state]" class="form-control" placeholder="State" value="<?php echo $shipping->state; ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="name">Zip Code</label>
        <input type="number" name="shipping[zipCode]" class="form-control" placeholder="Zip Code" value="<?php echo $shipping->zipCode; ?>">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="price">Country</label>
        <input type="text" name="shipping[country]" class="form-control" placeholder="Country" value="<?php echo $shipping->country; ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="name">Address Type</label>
        <input type="text" name="shipping[addressType]" class="form-control" placeholder="Address Type" readonly value="shipping">
    </div>
</div>
<button type="button" class="btn btn-lg btn-warning" onclick="setAction(this); object.resetParams().setForm('#form').load();">Save</button>

<script>
function setAction(button){
  var form = $(button).closest('form');
  form.attr('action', "<?php echo $this->getUrl()->getUrl('save', 'Admin_Customer_Address'); ?>");
}

</script>
