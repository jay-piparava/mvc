<?php $attributeOptions = $this->getAttributeOptions();?>

<h1>Attribute Options</h1>

<hr><br>
<div style="float:right;">
	<button type="button" class="btn btn-primary" name="update" onclick="setAction(this); object.resetParams().setForm('#form').load();">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<br><br>
<div class="container">
	<table class="table" id="exist">
		<tbody>
		<?php if ($attributeOptions): ?>
		<?php foreach ($attributeOptions->getData() as $key => $result): ?>
        <tr>
		<?php if ($result->optionId): ?>
				<input type="hidden" value="<?php echo $result->optionId; ?>" name="attributeOption[<?php echo $key; ?>][optionId]">
		<?php endif;?>
            <td><input type="text" class="form-control" placeholder="Enter Option Name " name="attributeOption[<?php echo $key; ?>][name]" required value="<?php echo $result->name; ?>"></td>
            <td><input type="text" class="form-control" placeholder="Enter Option Name " name="attributeOption[<?php echo $key; ?>][sortOrder]" required value="<?php echo $result->sortOrder; ?>"></td>
			<td><button type="button" class="btn btn-danger" onclick="deleteRow(this);">Delete</button></td>
        </tr>
		<?php endforeach;?>
		<?php endif;?>
		</tbody>
	</table>

	<button type="button" class="btn btn-primary" style="float: right;" onclick="addRow()">Add New</button>
</div>


<script type="text/javascript">

function setAction(button){
	var form = $(button).closest('form');
	form.attr('action', "<?php echo $this->getUrl()->getUrl('save', 'Admin_Attribute_AttributeOption'); ?>");
}

function deleteRow(button){
	$(button).closest('tr').remove();
}
function addRow() {
	var existing = document.getElementById('exist').children[0];
	var newrow = document.getElementById('new');
	existing.appendChild(newrow.children[0].children[0].cloneNode(true));
}
</script>



