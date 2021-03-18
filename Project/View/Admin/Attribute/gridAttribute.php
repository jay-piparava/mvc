<?php $attributes = $this->getAttributes(); ?>
<div class="container">
	<h1>Attributes</h1>
  <hr>
	<a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').resetParams().load();" class="btn btn-primary">Add Attribute</a><br><br>
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Entity Type Id</th>
      <th scope="col">Name</th>
      <th scope="col">Code</th>
      <th scope="col">Input Type</th>
      <th scope="col">Backend Type</th>
      <th scope="col">Set Order</th>
      <th scope="col">Backend Model</th>
      <th scope="col" align="center" colspan="2" style="text-align: center;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($attributes) : ?>
  		<?php foreach ($attributes->getData() as $result) : ?>
          <tr>
              <th scope='row'><?php echo $result->attributeId; ?></th>
              <td><?php echo $result->entityTypeId; ?></td>
              <td><?php echo $result->name; ?></td>
              <td><?php echo $result->code; ?></td>
              <td><?php echo $result->inputType; ?></td>
              <td><?php echo $result->backendType; ?></td>
              <td><?php echo $result->setOrder; ?></td>
              <td><?php echo $result->backendModel; ?></td>
              <td align="center"><a class="btn btn-warning" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,['id'=>$result->attributeId]);  ?>').resetParams().load();" >Edit</a></td>
              <td align="center"><a class="btn btn-danger" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$result->attributeId]); ?>').resetParams().load();">Delete</a></td>
            </tr>
      <?php endforeach ?>
    <?php else : ?>
          <tr><td colspan="7" align="center">No Data For Attributes</td></tr>
	  <?php endif ?>
  </tbody>
</table>
</div>