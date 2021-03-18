<?php $media = $this->getMedia();?>
<h1>Media</h1>
<hr><br>
<div style="float:right;">
	<button type="button" class="btn btn-primary" name="update" onclick="setUpdate(this); object.setForm('#form').load();">Update</button>&nbsp;&nbsp;
	<button type="button" class="btn btn-danger" name="delete" onclick="setDelete(this); object.setForm('#form').load();" >Delete</button>
</div>
<br><br>
<div class="container">
	<table class="table">
		<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">image</th>
			<th scope="col">Label</th>
			<th scope="col">Small</th>
			<th scope="col">Thumb</th>
			<th scope="col">Base</th>
			<th scope="col">gallery</th>
			<th scope="col">Remove</th>
			</tr>
		</thead>
		<tbody>
		<?php if ($media): ?>
			<?php foreach ($media->getData() as $key => $result): ?>
				<?php $mediaId = $result->mediaId;?>
				<?php $flag = '';?>
				<tr>
					<th scope='row'><?php echo $result->mediaId; ?></th>
					<?php $image = 'skin/Admin/Images/Product/' . $result->image;?>
					<td><img src = '<?php echo $image ?>' height='80px' width='100px'></img></td>
					<?php $text = $result->label;?>

					<input type='hidden' value='<?php echo $mediaId; ?>' name='label[media][<?php echo $key; ?>][mediaId]'>
					<td><input type='text' value='<?php echo $text; ?>' name='label[media][<?php echo $key; ?>][label]'></td>
					<?php if ($result->small == '1'): ?>
						<?php $flag = 'checked';?>
					<?php else: ?>
						<?php $flag = '';?>
					<?php endif?>
					<td><input type = 'radio' class='isSmall' <?php echo $flag; ?> name='label[media][<?php echo $key; ?>][small]' ></td>
					<?php if ($result->thumb == 1): ?>
						<?php $flag = 'checked';?>
					<?php else: ?>
						<?php $flag = '';?>
					<?php endif?>
					<td><input type = 'radio' class='isThumb' <?php echo $flag; ?> name='label[media][<?php echo $key; ?>][thumb]' ></td>
					<?php if ($result->base == 1): ?>
						<?php $flag = 'checked';?>
					<?php else: ?>
						<?php $flag = '';?>
					<?php endif?>
					<td><input type = 'radio' class='isBase' <?php echo $flag; ?> name='label[media][<?php echo $key; ?>][base]' item-id = $mediaId></td>
					<?php if ($result->gallery == 1): ?>
						<?php $flag = 'checked';?>
					<?php else: ?>
						<?php $flag = '';?>
					<?php endif?>
					<td><input type = 'checkbox' <?php echo $flag; ?> name='label[media][<?php echo $key; ?>][gallery]'></td>
					<td><input type = 'checkbox' name='remove[<?php echo $mediaId; ?>]'></td>
				</tr>
			<?php endforeach?>
			<?php else: ?>
				<tr><td colspan='8' align='center'><b>No Record For Media</b></td></tr>
			<?php endif?>
		</tbody>
	</table>
<br><br><br>

	<div class="form-row">
	<div class="form-group col-md-6">
		<input type="file"  class="form-control" id="file" name="media" />
            <!-- <input type="button" class="button" value="Upload" > -->
	</div>
		<button type="button" name="upload" class="btn btn-warning button" id="but_upload">Upload</button>
	</div>
<script type="text/javascript">

function setUpdate(button){
	var form = $(button).closest('form');
	form.attr('action', "<?php echo $this->getUrl()->getUrl('update', 'Admin_Product_media'); ?>");
}

function setDelete(button) {
	var form = $(button).closest('form');
	form.attr('action', "<?php echo $this->getUrl()->getUrl('delete', 'Admin_Product_media'); ?>");
}

$(document).ready(function(){
	$(".isSmall").change(function () {
	$('.isSmall').not(this).prop('checked', false);
	});

	$(".isThumb").change(function () {
	$('.isThumb').not(this).prop('checked', false);
	});

	$(".isBase").change(function () {
	$('.isBase').not(this).prop('checked', false);
  });
});

$(document).ready(function(){

	$("#but_upload").click(function(){
		object.setUrl('<?php echo $this->getUrl()->getUrl("upload", "Admin_product_media"); ?>');
		var fd = new FormData();
		var files = $('#file')[0].files;

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