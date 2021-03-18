<?php $customer = $this->getTableRow();?>
<?php $customerGroup = $this->getCustomerGroup();?>
<?php if ($this->getRequest()->getGet('id')): ?>
<h1>Edit Customer</h1>
<?php else: ?>
<h1>Add Customer</h1>
<?php endif?>
<hr><br>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" class="form-control" placeholder="First Name" name="customer[firstName]" required value="<?php echo $customer->firstName; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last Name</label>
      <input type="text" class="form-control"  placeholder="Last Name" name="customer[lastName]" required value="<?php echo $customer->lastName; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" placeholder="Email" name="customer[email]" required value="<?php echo $customer->email; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Mobile No.</label>
      <input type="text" class="form-control"  placeholder="Monile No." name="customer[mobile]" required value="<?php echo $customer->mobile; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Status</label>
      <select class="custom-select" name="customer[status]" required>
        <option value="">--Select--</option>
          <?php foreach ($customer->getStatusOptions() as $key => $value): ?>
            <option value="<?php echo $key ?>" <?php if ($customer->status == $key): ?> selected <?php endif?>><?php echo $value; ?></option>
          <?php endforeach?>
      </select>
  </div>
  <div class="form-group col-md-6">
      <label for="inputPassword4">Customer Group</label>
      <select class="custom-select" name="customer[groupId]" required>
      <?php foreach ($customerGroup->data as $key => $value): ?>
          <option value="<?php echo $value->groupId; ?>"><?php echo $value->name; ?></option>
      <?php endforeach?>
   </select>
  </div>
</div>
  <button type="button" name="update" class="btn btn-primary" onclick="setAction(this); object.resetParams().setForm('#form').load();">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;

<script>
  function setAction(button){
  var form = $(button).closest('form');
  form.attr('action', "<?php echo $this->getUrl()->getUrl('save', 'Admin_Customer'); ?>");
}
</script>