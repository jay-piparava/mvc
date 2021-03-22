<?php $brands = $this->getBrands();?>
<form id="brand" method="post">
<div class="container">
<h1>Brand</h1>
<hr><br>
<div style="float:right;">
	<button type="button" class="btn btn-primary" name="update" onclick="setUpdate(this); object.setForm('#brand').load();">Update</button>&nbsp;&nbsp;
	<button type="button" class="btn btn-danger" name="delete" onclick="setDelete(this); object.setForm('#brand').load();" >Delete</button>
</div>
<br><br>
<div class="container">
	<table class="table">
		<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">image</th>
			<th scope="col">Name</th>
			<th scope="col">Sort Order</th>
			<th scope="col" class="text-center">Status</th>
			<th scope="col">Remove</th>
			</tr>
		</thead>
		<tbody>
		<?php if ($brands): ?>
			<?php foreach ($brands->getData() as $key => $result): ?>
				<tr>
					<th scope='row'><?php echo $result->brandId; ?></th>
					<?php $image = 'Images/Brand/' . $result->image;?>
					<td><img src = '<?php echo $image ?>' height='80px' width='100px'></img></td>

					<input type='hidden' value='<?php echo $result->brandId; ?>' name='label[brand][<?php echo $key; ?>][brandId]'>
					<td><input type='text' value='<?php echo $result->name; ?>' name='label[brand][<?php echo $key; ?>][name]'></td>
					<td><input type='text' value='<?php echo $result->sortOrder; ?>' name='label[brand][<?php echo $key; ?>][sortOrder]'></td>
					<?php if ($result->status == 0): ?>
            			<td align="center"><a class="btn btn-success" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status', null, ['id' => $result->brandId]); ?>').resetParams().load();">Enable</a></td>
         			 <?php else: ?>
            			<td align="center"><a class="btn btn-danger" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status', null, ['id' => $result->brandId]); ?>').resetParams().load();">Disable</a></td>
         			 <?php endif?>
					<td align="center"><input type = 'checkbox' name='remove[<?php echo $result->brandId; ?>]'></td>
				</tr>
			<?php endforeach?>
			<?php else: ?>
				<tr><td colspan='8' align='center'><b>No Record For Brand</b></td></tr>
			<?php endif?>
		</tbody>
	</table>
<br><br><br>
	<div class="form-row">
	<div class="form-group col-md-6">
		<input type="file"  class="form-control file" id="brand" name="media" />
            <!-- <input type="button" class="button" value="Upload" > -->
	</div>
		<button type="button" name="upload" class="btn btn-warning button" id="brandUpload">Upload</button>
	</div>
</form>
<script type="text/javascript">

function setUpdate(button){
	var form = $(button).closest('form');
	form.attr('action', "<?php echo $this->getUrl()->getUrl('update', 'Admin_Brand'); ?>");
}

function setDelete(button) {
	var form = $(button).closest('form');
	form.attr('action', "<?php echo $this->getUrl()->getUrl('delete', 'Admin_Brand'); ?>");
}

$(document).ready(function(){

$("#brandUpload").click(function(){
	object.setUrl('<?php echo $this->getUrl()->getUrl("upload", "Admin_brand"); ?>');
	var fd = new FormData();
	var files = $('.file')[0].files;

	// Check file selected or not
	if(files.length > 0 ){
	fd.append('file',files[0]);

	$.ajax({
		url: object.getUrl(),
		type: 'post',
		data: fd,
		contentType: false,
		processData: false,
		success: function(response){
			$.each(response.element, function (i, element) {
				$(element.selector).html(element.html);
				//alert(element.selector+' '+element.html);
			});
		},
	});
	}else{
	alert("Please select a file.");
	}
});
});
</script>