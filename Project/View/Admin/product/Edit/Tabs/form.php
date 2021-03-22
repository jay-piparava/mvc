<?php if ($id = $this->getRequest()->getGet('id')): ?>
 <h1>Edit Product</h1>
<?php else: ?>
<h1>Add Product</h1>
<?php endif?>

<hr><br>
<?php $product = $this->getTableRow();?>
<?php $brands = $this->getBrands();?>
<div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Select Brand</label>
      <select class="custom-select" name="product[brandId]" required>
        <option value="">--Select--</option>
        <?php foreach ($brands->getData() as $key => $value): ?>
          <?php echo $key; ?>
          <option value="<?php echo $value->brandId; ?>" <?php if ($product->brandId == $value->brandId): ?> selected <?php endif?>><?php echo $value->name; ?></option>
        <?php endforeach?>
      </select>
    </div>

  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" placeholder="Name" name="product[name]" required value="<?php echo $product->name; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Price</label>
      <input type="text" class="form-control"  placeholder="Price" name="product[price]" required value="<?php echo $product->price ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Discount</label>
      <input type="text" class="form-control" placeholder="Discount" name="product[discount]" required value="<?php echo $product->discount ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Quantity</label>
      <input type="text" class="form-control"  placeholder="Quantity" name="product[quantity]" required value="<?php echo $product->quantity ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Description</label>
      <input type="text" class="form-control" placeholder="Description" name="product[description]" required value="<?php echo $product->description ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Status</label>
      <select class="custom-select" name="product[status]" required>
        <option value="">--Select--</option>
        <?php foreach ($product->getStatusOptions() as $key => $value): ?>
          <option value="<?php echo $key ?>" <?php if ($product->status == $key): ?> selected <?php endif?>><?php echo $value; ?></option>
        <?php endforeach?>
      </select>
  </div>
</div>
	<button type="button" name="update" class="btn btn-warning" onclick="submitForm(this); object.resetParams().setForm('#form').load();">Save</button>
<script>
function submitForm(button){
var form = $(button).closest('form');
form.attr('action', "<?php echo $this->getUrl()->getUrl('save', 'Admin_Product'); ?>");
// form.submit();

}
</script>