<?php $cms = $this->getCms(); ?>
<div class="container">
	<h1>Cms</h1>
  <hr>
	<a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').resetParams().load();" class="btn btn-primary">Add Cms</a><br><br>
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Identifier</th>
      <th scope="col">Content</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="2" align="center" style="text-align: center;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($cms) : ?>
  		<?php foreach ($cms->getData() as $result) : ?>
  			<tr>
      			<th scope='row'><?php echo $result->pageId; ?></th>
      			<td><?php echo $result->title; ?></td>
            <td><?php echo $result->identifier; ?></td>
            <td><?php echo $result->content; ?></td>
            <?php if ($result->status == 0) : ?>
            <td><a class="btn btn-success" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status',NULL,['id'=>$result->pageId]);  ?>').resetParams().load();">Enable</a></td>
          <?php else : ?>
            <td><a class="btn btn-danger" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status',NULL,['id'=>$result->pageId]);  ?>').resetParams().load();">Disable</a></td>
          <?php endif ?>
      			<td align="center"><a class="btn btn-warning" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,['id'=>$result->pageId]); ?>').resetParams().load();" >Edit</a></td>
      			<td align="center"><a class="btn btn-danger" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$result->pageId]); ?>').resetParams().load();" >Delete</a></td>
         </tr>
  		<?php endforeach ?>
      <?php else :?>
      <tr><td colspan="7" align="center">No Data For Admin</td></tr>
      <?php endif ?>
  </tbody>
</table>
</div>