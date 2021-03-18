<?php $groupPrice = $this->getCustomerGroupPrice();?>

<h1>Product Group Price</h1>
<hr><br>
<div style="float:right;">
	<button type="button" class="btn btn-primary" name="update" onclick="submitForm(this);object.setForm('#form').load()">Update</button>
</div>
<br><br>
<div class="container">
	<table class="table">
		<thead>
			<tr>
			<th scope="col">Product Name</th>
			<th scope="col">SkU</th>
            <th scope="col">Product Price</th>
			<th scope="col">Group Name</th>
			<th scope="col">Group Price</th>
			</tr>
		</thead>
		<tbody>
		<?php if ($groupPrice): ?>
			<?php foreach ($groupPrice->getData() as $key => $result): ?>
				<?php if ($result->groupPriceId): ?>
					<input type='hidden' value="<?php echo $result->groupPriceId; ?> "  name='ProductCustomerGroupPrice[<?php echo $key; ?>][groupPriceId]'>
				<?php endif?>
				<input type='hidden' value="<?php echo $result->groupId; ?>"  name='ProductCustomerGroupPrice[<?php echo $key; ?>][groupId]' >
				<tr>
					<td><?php echo $result->productName; ?></td>
					<td><?php echo $result->sku; ?></td>
					<td><?php echo $result->productPrice; ?></td>
					<td><?php echo $result->name; ?></td>
					<td><input type="text" class="form-control" placeholder="Entert Price For Group" required name='ProductCustomerGroupPrice[<?php echo $key; ?>][price]' value="<?php echo $result->price; ?>"></td>
				</tr>
			<?php endforeach?>
		<?php endif?>
		</tbody>
	</table>
<script>
function submitForm(button){
var form = $(button).closest('form');
form.attr('action', "<?php echo $this->getUrl()->getUrl('save', 'Admin_Product_ProductCustomerGroupPrice'); ?>");
}
</script>