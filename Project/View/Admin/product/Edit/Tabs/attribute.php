<?php $attributes = $this->getAttributes();?>
<?php $attribute = $this->getAttribute();?>
<h1>Attribute Options</h1>
<hr><br>
<div class="mr-5" style="float:right;">
	<button type="button" class="btn btn-primary" name="update" onclick="setAction(this); object.resetParams().setForm('#form').load();">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<br><br>
<div class="container">
    <div class="form-row">
    <input type='hidden' name='productId' value='<?php echo $attribute->productId; ?>' >
<?php if (!$attributes): ?>
    <center><h3>No Attribute Found</h3></center>
<?php else: ?>
    <?php foreach ($attributes->getData() as $key => $result): ?>
        <?php $name = $result->name;?>
        <?php $options = $result->getOptions();?>
    <div class="form-group col-md-10">
        <label for="inputEmail4"><?php echo $result->name; ?></label>
            <?php //for textArea ?>
            <?php if ($result->inputType == 'textarea'): ?>
                <textarea class="form-control" rows="5" name="<?php echo $result->name; ?>">
                    <?php echo $attribute->$name; ?>
                </textarea>
            <?php endif?>
            <?php //for text ?>
            <?php if ($result->inputType == 'text'): ?>
                <input type="<?php echo $result->inputType; ?>" value="<?php echo $attribute->$name; ?>" class="form-control" placeholder="<?php echo $result->name; ?>" name="<?php echo $result->name; ?>" required >
            <?php endif?>

            <?php //for select?>
            <?php if ($result->inputType == 'select'): ?>
                <select class="form-control" name="<?php echo $result->name; ?>" >
                    <?php if (!$options): ?>
                        <option value="">--No Options Available--</option>
                    <?php else: ?>
                        <option value="">--select Option--</option>
                    <?php foreach ($options->getData() as $key => $option): ?>
                            <option value="<?php echo $option->name; ?>" <?php if ($attribute->$name == $option->name): ?> selected <?php endif;?>><?php echo $option->name; ?></option>
                    <?php endforeach;?>
                    <?php endif?>
                </select>
            <?php endif;?>

            <?php //select Multiple ?>
            <?php if ($result->inputType == 'select-multiple'): ?>
                <select class="form-control" multiple name="<?php echo $result->name; ?>[]" >
                    <?php if (!$options): ?>
                        <option value="">--No Options Available--</option>
                    <?php else: ?>
                        <option value="">--select Option--</option>
                    <?php foreach ($options->getData() as $key => $option): ?>
                        <?php $select = '';?>
                        <?php $data = explode(',', $attribute->$name);?>
                        <?php foreach ($data as $key => $value): ?>
                           <?php if ($value == $option->name): ?>
                               <?php $select = 'selected';?>
                           <?php endif;?>
                       <?php endforeach;?>
                            <option value="<?php echo $option->name; ?>" <?php echo $select; ?>><?php echo $option->name; ?></option>
                    <?php endforeach;?>
                    <?php endif?>
                </select>
            <?php endif;?>

            <?php //for Check Box ?>
            <?php if ($result->inputType == 'checkbox'): ?><br>
                <?php if (!$options): ?>
                        <label>--No Options Available--</label>
                    <?php else: ?>
                    <?php foreach ($options->getData() as $key => $option): ?>
                        <?php $check = '';?>
                        <?php $data = explode(',', $attribute->$name);?>
                        <?php foreach ($data as $key => $value): ?>
                           <?php if ($value == $option->name): ?>
                               <?php $check = 'checked';?>
                           <?php endif;?>
                       <?php endforeach;?>
                        <div class="form-check">
                                <input type="<?php echo $result->inputType; ?>" class="form-check-input" value="<?php echo $option->name; ?>" name="<?php echo $result->name; ?>[]" <?php echo $check; ?>><?php echo $option->name ?>
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
            <?php endif;?>

            <?php //for Radio Button ?>
            <?php if ($result->inputType == 'radio'): ?><br>
                <?php if (!$options): ?>
                        <label>--No Options Available--</label>
                    <?php else: ?>
                        <?php foreach ($options->getData() as $key => $option): ?>
                            <div class="form-check">
                                <input type="<?php echo $result->inputType; ?>" name="<?php echo $result->name; ?>" class="form-check-input" value="<?php echo $option->name; ?>"<?php if ($attribute->$name == $option->name): ?> checked <?php endif;?>><?php echo $option->name ?>
                            </div>
                        <?php endforeach;?>
                <?php endif;?>
            <?php endif;?>
    </div>
    <?php endforeach;?>
<?php endif;?>
    </div>
</div>

<script>
function setAction(button){
    var form = $(button).closest('form');
    form.attr('action', "<?php echo $this->getUrl()->getUrl('save', 'Admin_Product_Attribute'); ?>");
}
</script>
