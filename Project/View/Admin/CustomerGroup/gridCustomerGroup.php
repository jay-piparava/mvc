<?php $customerGroup = $this->getCustomerGroups(); ?>
<div class="container">
	<h1>Customer Group</h1>
  <hr>
	<a href="javascript:void(0);" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').resetParams().load();" class="btn btn-primary">Add Customer Group</a><br><br>
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Default</th>
      <th scope="col" align="center" colspan="2" style="text-align: center;">Action</th>
    </tr>
  </thead>
  <tbody>
	<?php if($customerGroup) : ?>
  		<?php foreach ($customerGroup->data as $result) : ?>
  			<tr>
     			<th scope='row'><?php echo $result->groupId; ?></th>
     			<td><?php echo $result->name; ?></td>
     			<td><?php echo $result->default; ?></td>
      			<td align="center"><a class="btn btn-warning" href="javascript:void(0);" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,['id'=>$result->groupId]); ?>').resetParams().load();">Edit</a></td>
      			<td align="center"><a class="btn btn-danger" href="javascript:void(0);" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$result->groupId]); ?>').resetParams().load();">Delete</a></td>
         	</tr>
  		<?php endforeach ?>
	<?php else : ?>
		<tr><td colspan="5" align="center"><b>No Records For Customer </b></td></tr>
	<?php endif ?>
  </tbody>
</table>
</div> 