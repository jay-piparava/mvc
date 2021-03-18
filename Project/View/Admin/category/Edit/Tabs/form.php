<?php if ($this->getRequest()->getGet('id')): ?>
 <h1>Update Category</h1>
<?php else: ?>
<h1>Insert Category</h1>
<?php endif?>
<hr><br>
<?php $category = $this->getTableRow();?>
<?php $categoryOption = $this->getCategoryOptions();?>
<div class="form-row">
  <div class="form-group col-md-12">
    <label for="inputEmail4">Select Parent Category</label>
      <select class="custom-select" name="category[parentId]">
          <?php foreach ($categoryOption as $categoryId => $name): ?>
                <option value="<?php echo $categoryId; ?>" <?php if ($categoryId == $category->parentId): ?> selected <?php endif;?>> <?php echo $name; ?></option>
          <?php endforeach;?>
      </select>
  </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" placeholder="Name" name="category[name]" required value="<?php echo $category->name; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Status</label>
      <select class="custom-select" name="category[status]" required>
        <option value="">--Select--</option>
          <?php foreach ($category->getStatusOptions() as $key => $value) {?>
            <option value="<?php echo $key ?>" <?php if ($category->status == $key) {?> selected <?php }?>><?php echo $value; ?></option>
          <?php }?>
      </select>
    </div>
</div>
<div class="form-row">
  <div class="form-group col-md-12">
    <label for="inputEmail4">Description</label>
    <input type="text" class="form-control" placeholder="Description" name="category[description]" required value="<?php echo $category->description; ?>">
  </div>
</div>
  	<button type="button" name="update" class="btn btn-warning" onclick="cheangerUrl(this); object.setForm('#form').load();">Save</button>

<script>
function cheangerUrl(button){
  var form = $(button).closest('form');
  form.attr('action', "<?php echo $this->getUrl()->getUrl('save'); ?>");
}
</script>