<?php $customerGroup = $this->getTableRow();?>
<?php //$customerGroup = $this->getCustomerGroup(); ?>
<?php if ($this->getRequest()->getGet('id')): ?>
<h1>Edit Custome Groupr</h1>
<?php else: ?>
<h1>Add Customer Group</h1>
<?php endif?>
<hr><br>
<form method="post" id="customerGroupForm" action=<?php echo $this->getUrl()->getUrl('save'); ?>>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Customner Group Name</label>
      <input type="text" class="form-control" placeholder="Customner Group Name" name="customerGroup[name]" required value="<?php echo $customerGroup->name; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Default [0/1]</label>
      <input type="text" class="form-control"  placeholder="Default [0/1]" name="customerGroup[default]" required value="<?php echo $customerGroup->default; ?>">
    </div>
  </div>
    <button type="button" name="update" class="btn btn-primary" onclick="object.resetParams().setForm('#customerGroupForm').load();">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;
</form>