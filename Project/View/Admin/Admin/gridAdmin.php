<?php $admin = $this->getAdmins();?>
<div class="container">
	<h1>Admin</h1>
  <hr>
	<a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').resetParams().load();" class="btn btn-primary">Add Admin</a><br><br>
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User Name</th>
      <th scope="col">Password</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="2" align="center" style="text-align: center;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($admin): ?>
  		<?php foreach ($admin->getData() as $result): ?>
  			<tr>
      			<th scope='row'><?php echo $result->adminId; ?></th>
      			<td><?php echo $result->userName; ?></td>
      			<td><?php echo $result->password; ?></td>
            <?php if ($result->status == 0): ?>
            <td align="center"><a class="btn btn-success" href=" javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status', null, ['id' => $result->adminId]); ?>').resetParams().load();">Enable</a></td>
          <?php else: ?>
            <td align="center"><a class="btn btn-danger" href=" javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status', null, ['id' => $result->adminId]); ?>').resetParams().load();">Disable</a></td>
          <?php endif?>
      			<td align="center"><a class="btn btn-warning" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', null, ['id' => $result->adminId]); ?>').resetParams().load();">Edit</a></td>
      			<td align="center"><a class="btn btn-danger" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $result->adminId]); ?>').resetParams().load();" >Delete</a></td>
         </tr>
  		<?php endforeach?>
      <?php else: ?>
      <tr><td colspan="6" align="center">No Data For Admin</td></tr>
      <?php endif?>
  </tbody>
</table>
</div>