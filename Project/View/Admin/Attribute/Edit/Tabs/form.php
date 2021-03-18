<?php if ($this->getRequest()->getGet('id')): ?>
 <h1>Update Attribute</h1>
<?php else: ?>
<h1>Insert Attribute</h1>
<?php endif?>
<hr><br>
<?php $attribute = $this->getTableRow();?>
<div class="form-row">
  <div class="form-group col-md-12">
    <label for="inputEmail4">Select Entity Type</label>
      <select class="custom-select" name="attribute[entityTypeId]">
          <?php foreach ($attribute->getEntityTypeOptions() as $key => $value) {?>
                <option value="<?php echo $key; ?>" <?php if ($attribute->entityTypeId == $key) {?> selected <?php }?>> <?php echo $value; ?></option>
          <?php }?>
      </select>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">Select InputType Type</label>
      <select class="custom-select" name="attribute[inputType]">
          <?php foreach ($attribute->getInputTypeOptions() as $key => $value) {?>
                <option value="<?php echo $key; ?>" <?php if ($attribute->inputType == $key) {?> selected <?php }?>> <?php echo $value; ?></option>
          <?php }?>
      </select>
  </div>
  <div class="form-group col-md-6">
    <label for="inputEmail4">Select Backend Type</label>
      <select class="custom-select" name="attribute[backendType]">
          <?php foreach ($attribute->getBackendTypeOptions() as $key => $value) {?>
                <option value="<?php echo $key; ?>" <?php if ($attribute->backendType == $key) {?> selected <?php }?>> <?php echo $value; ?></option>
          <?php }?>
      </select>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">Name</label>
    <input type="text" class="form-control" placeholder="Name" name="attribute[name]" required value="<?php echo $attribute->name; ?>">
  </div>
  <div class="form-group col-md-6">
    <label for="inputEmail4">Code</label>
    <input type="text" class="form-control" placeholder="Code" name="attribute[code]" required value="<?php echo $attribute->code; ?>">
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">Set Order</label>
    <input type="text" class="form-control" placeholder="Set Order" name="attribute[setOrder]" required value="<?php echo $attribute->setOrder; ?>">
  </div>
  <div class="form-group col-md-6">
    <label for="inputEmail4">Backend Model</label>
    <input type="text" class="form-control" placeholder="Backend Model" name="attribute[backendModel]" required value="<?php echo $attribute->backendModel; ?>">
  </div>
</div>
  	<button type="button" name="update" class="btn btn-warning" onclick="setAction(this); object.resetParams().setForm('#form').load();">Save</button>

    <script>
function setAction(button){
var form = $(button).closest('form');
form.attr('action', "<?php echo $this->getUrl()->getUrl('save', 'Admin_Attribute'); ?>");
}
</script>
