<?php $customers = $this->getCustomers(); ?>
<div class="container">
	<h1>Customer</h1>
  <hr>
	<a href="javascript:void(0);" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,[],true); ?>').resetParams().load();" class="btn btn-primary">Add Customer</a><br><br>
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Customer Type</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Status</th>
      <th scope="col" align="center" colspan="2" style="text-align: center;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($customers) : ?>
  		<?php foreach ($customers->data as $result) :?>
  			<tr>
      			<th scope='row'><?php echo $result->customerId; ?></th>
      			<td><?php echo $result->firstName; ?></td>
      			<td><?php echo $result->lastName; ?></td>
            <td><?php echo $result->name; ?></td>
    			  <td><?php echo $result->email; ?></td>
      			<td><?php echo $result->mobile; ?></td>
            <?php if ($result->status == 0) : ?>
            <td align="center"><a class="btn btn-success" href="javascript:void(0);" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status','Admin_Customer',['id'=>$result->customerId]); ?>').resetParams().load();" >Enable</a></td>
          <?php  else : ?>
            <td align="center"><a class="btn btn-danger" href="javascript:void(0);" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status','Admin_Customer',['id'=>$result->customerId]); ?>').resetParams().load();;" >Disable</a></td>
          <?php endif ?>
      			<td align="center"><a class="btn btn-warning" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form','Admin_Customer',['id'=>$result->customerId]); ?>').resetParams().load();">Edit</a></td>
      			<td align="center"><a class="btn btn-danger" href="javascript:void(0);" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete','Admin_Customer',['id'=>$result->customerId]); ?>').resetParams().load();">Delete</a></td>
         	</tr>
  		<?php endforeach ?>
    <?php else : ?>
      <tr><td colspan='9' align='center'><b>No Data For Customer...</b></td></tr>
    <?php endif ?>
  </tbody>
</table>
</div> 