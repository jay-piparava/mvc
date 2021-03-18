<?php $admin = $this->getTableRow();?>
<?php if ($admin->adminId): ?>
 <h1>Update Admin</h1>
<?php else: ?>
<h1>Insert Admin</h1>
<?php endif?>
<form method="post" id="adminForm" action="<?php echo $this->getUrl()->getUrl('save', 'admin_admin', ['id' => $admin->adminId]); ?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">User Name</label>
      <input type="text" class="form-control" placeholder="User Name" name="admin[userName]" required value="<?php echo $admin->userName; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Password</label>
      <input type = "password" class="form-control" placeholder="Password" name="admin[password]" required value="<?php echo $admin->password; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputPassword4">Status</label>
      <select class="custom-select" name="admin[status]" required>
        <option value="">--Select--</option>
          <?php foreach ($admin->getStatusOptions() as $key => $value): ?>
            <option value="<?php echo $key ?>" <?php if ($admin->status == $key) {?> selected <?php }?>><?php echo $value; ?></option>
          <?php endforeach?>
     </select>
    </div>
  </div>
  	<button type="button" name="update" class="btn btn-warning" onclick="object.resetParams().setForm('#adminForm').load();">Save</button>
</form>