<?php $categories = $this->getCategories(); ?>
<div class="container">
	<h1>Category</h1>
  <hr>
  <a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,[],true)?>').resetParams().load()" class="btn btn-primary">Add Categories</a><br><br>	
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Discription</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="2" align="center" style="text-align: center;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($categories) : ?>
  	  <?php foreach ($categories->data as $result) : ?>
  		  <tr>
      		<th scope='row'><?php echo $result->categoryId; ?></th>
            <td><?php echo $this->getName($result); ?></td>
      		  <td><?php echo $result->description; ?></td>
            <?php if ($result->status == 0) : ?>
            <td align="center"><a class="btn btn-success" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status',NULL,['id'=>$result->categoryId]); ?>').resetParams().load();">Enable</a></td>
          <?php  else : ?>
            <td align="center"><a class="btn btn-danger" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status',NULL,['id'=>$result->categoryId]); ?>').resetParams().load();">Disable</a></td>
          <?php endif ?>
      			<td align="center"><a class="btn btn-warning" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,['id'=>$result->categoryId]); ?>').resetParams().load();">Edit</a></td>
      			<td align="center"><a class="btn btn-danger" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$result->categoryId]); ?>').resetParams().load();">Delete</a></td>
         </tr>
  		<?php endforeach ?>
  	<?php else : ?>
        <tr>
          <td colspan="6" align="center">
            <b>No Data For Categories</b>
          </td>
        </tr>
    <?php endif ?>
  </tbody>
</table>
</div>