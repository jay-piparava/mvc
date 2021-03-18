<?php $result = $this->getTableRow();?>
<?php if ($this->getRequest()->getGet('id')): ?>
<h1>Edit Payment</h1>
<?php else: ?>
<h1>Add Payment</h1>
<?php endif?>
<hr><br>
<form method="post" id="paymentForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" placeholder="Name" name="payment[name]" required value="<?php echo $result->name; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Code</label>
      <input type="text" class="form-control"  placeholder="Code" name="payment[code]" required value="<?php echo $result->code; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Description</label>
      <input type="text" class="form-control" placeholder="Description" name="payment[description]" required value="<?php echo $result->description; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Status</label>
      <select class="custom-select" name="payment[status]" required>
    <option value="">--Select--</option>
        <?php foreach ($result->getStatusOptions() as $key => $value): ?>
          <option value="<?php echo $key ?>" <?php if ($result->status == $key): ?> selected <?php endif?>><?php echo $value; ?></option>
        <?php endforeach?>
 	 </select>
    </div>
  </div>
  	<button type="button" onclick="object.resetParams().setForm('#paymentForm').load();" name="update" class="btn btn-warning">Save</button>
</form>