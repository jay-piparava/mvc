<div class="float-right mb-2 mr-2">
            <button type="button" onclick="object.resetParams().setForm('#mediaForm').load()" class="btn btn-success text-left mt-3 mb-2">Update</button>
        <button type="button" onclick="object.resetParams().setForm('#mediaForm').setUrl('<?php echo $this->getUrl()->getUrl('delete', 'admin_category_media'); ?>').load()" class="btn btn-danger text-left mt-3 mb-2">Remove</button>
    </div><br>
    <div class="h2 text-center mb-2" >
        <p>Category Media Details</p>
    </div>
    <?php $image = $this->getMedia();
$categoryId = $this->getTableRow()->categoryId;
if (!empty($image)): ?>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="row" style="white-space: nowrap;">Image</th>
                <th>Label</th>
                <th>Icon</th>
                <th>Base</th>
                <th>Banner</th>
                <th>Status</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($image->data as $key => $value): ?>
                <tr class="text-center">
                    <th scope="row" style="white-space: nowrap;"><img src="Images\Category\<?php echo $value->image; ?>" style="height:100px; width:100px" alt=""></th>
                    <th><input type="text" class="form-control" placeholder="Enter Name" name="img[data][<?php echo $value->imageId ?>][label]" value="<?php echo $value->label ?>" ></th>
                    <th><input type="radio" name="img[Icon]" value="<?php echo $value->imageId; ?>" <?php if ($value->icon == 1): ?> <?php echo "checked" ?> <?php endif;?> ></th>
                    <th><input type="radio" name="img[base]" value="<?php echo $value->imageId; ?>" <?php if ($value->base == 1): ?> <?php echo "checked" ?> <?php endif;?>></th>
                    <th><input type="checkbox" name="img[data][<?php echo $value->imageId ?>][banner]" <?php if ($value->banner == 1): ?> <?php echo "checked" ?> <?php endif;?>></th>
                        <?php if ($value->status == 0): ?>
                            <td align="center"><a class="btn btn-success" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status', 'Admin_Category_media', ['id' => $value->imageId, 'categoryId' => $categoryId]) ?>').resetParams().load();">Enable</a></td>
                        <?php else: ?>
                            <td align="center"><a class="btn btn-danger"href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('status', 'Admin_Category_media', ['id' => $value->imageId, 'categoryId' => $categoryId]) ?>').resetParams().load();">Disable</a></td>
                        <?php endif?>
                    <th><input type="checkbox" name="remove[<?php echo $value->imageId ?>]" ></th>
                </tr>
            <?php endforeach;?>
            <?php else: ?>
                <?php echo '<p class=text-center><strong>No Image Found</strong><p>'; ?>
            <?php endif;?>
        </tbody>
    </table>
    <div class="text-center">
        <div class="input-group mb-3">
                <input type="file" id="file" name="file">
            <div class="input-group-prepend">
                <button type="button" id="btn_upload" class="input-group-text">Upload</button>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function(){
        $("#btn_upload").click(function(){
            object.setUrl('<?php echo $this->getUrl()->getUrl("upload", "admin_category_media"); ?>');
            var fd = new FormData();
            var files = $('#file')[0].files;

            // Check file selected or not
            if(files.length > 0 )
            {
                fd.append('file',files[0]);
                $.ajax({
                    url: object.getUrl(),
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response)
                    {
                        $.each(response.element, function (i, element) {
                            $(element.selector).html(element.html);
                        });
                    },
                });
            }
            else
            {
                alert("Please select a file.");
            }
        });
    });
</script>
