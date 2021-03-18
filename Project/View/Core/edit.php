<div class="d-flex">
    <div class="mr-5 ml-5 pr-4">
    <?php if ($this->getRequest()->getGet('id')): ?>
        <?php echo $this->getTabHtml(); ?>
    <?php endif;?>
    </div>
    <div class="pr-5 w-75">
        <form method="post" id="form" enctype="multipart/form-data">
            <?php echo $this->getTabContent(); ?>
        </form>
    </div>
</div>
<div style="display: none;">
	<table id="new">
		<tbody>
        	<tr>
            	<td><input type="text" class="form-control" placeholder="Enter Option Name " required name="new[]"></td>
            	<td><input type="text" class="form-control" placeholder="Enter Sort Order " required name="new[]"></td>
				<td><button type="button" class="btn btn-danger" onclick="deleteRow(this);">Delete</button></td>
        	</tr>
		</tbody>
	</table>
</div>
