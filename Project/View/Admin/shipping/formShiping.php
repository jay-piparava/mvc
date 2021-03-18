<?php $result = $this->getTableRow();?>
<?php if ($result->methodId): ?>
<h1>Update Shiping</h1>
<?php else: ?>
<h1>Insert Shipping</h1>
<?php endif?>
<hr><br>
<form method="post" id="shipingForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" placeholder="Name" name="shiping[name]" required value="<?php echo $result->name; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Code</label>
      <input type="text" class="form-control"  placeholder="Code" name="shiping[code]" required value="<?php echo $result->code; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Amount</label>
      <input type="text" class="form-control" placeholder="Amount" name="shiping[amount]" required value="<?php echo $result->amount; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Status</label>
      <select class="custom-select" name="shiping[status]" required>
        <option value="">--Select--</option>
        <?php foreach ($result->getStatusOptions() as $key => $value): ?>
          <option value="<?php echo $key ?>" <?php if ($result->status == $key) {?> selected <?php }?>><?php echo $value; ?></option>
        <?php endforeach?>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Description</label>
      <input type="text" class="form-control" placeholder="Description" name="shiping[discription]" required value="<?php echo $result->discription; ?>">
    </div>
  </div>
  	<button type="button" name="update" class="btn btn-warning" onclick="object.resetParams().setForm('#shipingForm').load();">Save</button>
</form>