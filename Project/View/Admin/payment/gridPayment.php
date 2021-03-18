<?php $payments = $this->getPayments(); ?>
<div class="container">
	<h1>Payment</h1>
  <hr>
	<a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').resetParams().load();" class="btn btn-primary">Add Paymentt</a><br><br>
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Code</th>
      <th scope="col">Discription</th>
      <th scope="col">Status</th>
      <th scope="col" align="center" colspan="2" style="text-align: center;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($payments) : ?>
  		<?php foreach ($payments->data as $result) : ?>
          <tr>
              <th scope='row'><?php echo $result->methodId; ?></th>
              <td><?php echo $result->name; ?></td>
              <td><?php echo $result->code; ?></td>
              <td><?php echo $result->description; ?></td>
              <?php if ($result->status == 0) : ?>
                <td align="center"><a class="btn btn-success" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status',NULL,['id'=>$result->methodId]);  ?>').resetParams().load();">Enable</a></td>
              <?php  else : ?>
                <td align="center"><a class="btn btn-danger" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status',NULL,['id'=>$result->methodId]);  ?>').resetParams().load();">Disable</a></td>
              <?php endif ?>
              <td align="center"><a class="btn btn-warning" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,['id'=>$result->methodId]);  ?>').resetParams().load();">Edit</a></td>
              <td align="center"><a class="btn btn-danger" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$result->methodId]); ?>').resetParams().load();">Delete</a></td>
            </tr>
      <?php endforeach ?>
    <?php else : ?>
          <tr><td colspan="7" align="center">No Data For Payment</td></tr>
	  <?php endif ?>
  </tbody>
</table>
</div>