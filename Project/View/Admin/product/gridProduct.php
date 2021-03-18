<?php $products = $this->getProducts(); ?>
<div class="container">
	<h1>Product</h1>
  <hr>
	<a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,[],true)?>').resetParams().load()" class="btn btn-primary">Add Product</a><br><br>	
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Discount</th>
      <th scope="col">Quantity</th>
      <th scope="col">Discription</th>
      <th scope="col">SKU</th>
      <th scope="col">Status</th>
      <th scope="col" align="center" colspan="2" style="text-align: center;">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php if ($products) : ?>
    <?php	foreach ($products->getData() as $result): ?>
          <tr>
              <th scope='row'><?php echo $result->productId ?></th>
              <td><?php echo $result->name ?></td>
              <td><?php echo $result->price ?></td>
              <td><?php echo $result->discount ?></td>
              <td><?php echo $result->quantity ?></td>
              <td><?php echo $result->description ?></td>
              <td><?php echo $result->sku ?></td>
              <?php if ($result->status == 0) : ?>
                <td align="center"><a class="btn btn-success" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status', 'Admin_Product', ['id' => $result->productId]) ?>').resetParams().load();">Enable</a></td>
              <?php  else : ?>
                <td align="center"><a class="btn btn-danger"href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status', 'Admin_Product', ['id' => $result->productId]) ?>').resetParams().load();">Disable</a></td>
              <?php endif ?>
                <td align="center"><a class="btn btn-warning" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Admin_Product', ['id' => $result->productId],true) ?>').resetParams().load();">Edit</a></td>
                <td align="center"><a class="btn btn-danger" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete','Admin_Product',['id'=>$result->productId],true); ?>').resetParams().load();">Delete</a></td>	
              </tr>
    <?php endforeach ?>
  <?php else : ?>
      <tr><td colspan="10" align="center"><b>No Data For Product</b></td></tr>
  <?php endif ?>
  </tbody>
</table>
</div>