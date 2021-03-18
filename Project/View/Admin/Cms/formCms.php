<?php $cms = $this->getTableRow();?>
<?php if ($cms->pageId): ?>
 <h1>Edit Cms</h1>
<?php else: ?>
<h1>Add Cms</h1>
<?php endif?>
<form method="post" id="cmsForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Title</label>
      <input type="text" class="form-control" placeholder="Title" name="cms[title]" required value="<?php echo $cms->title; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Identifier</label>
      <input type = "text" class="form-control" placeholder="Identifier" name="cms[identifier]" required value="<?php echo $cms->identifier; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputPassword4">Status</label>
      <select class="custom-select" name="cms[status]" required>
        <option value="">--Select--</option>
          <?php foreach ($cms->getStatusOptions() as $key => $value): ?>
            <option value="<?php echo $key ?>" <?php if ($cms->status == $key) {?> selected <?php }?>><?php echo $value; ?></option>
          <?php endforeach?>
     </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="inputEmail4">Content</label>
      <main>
        <div class="adjoined-bottom">
          <div class="grid-container">
            <div class="grid-width-100">
              <div id="editor">
                <!-- <h1>hello</h1> -->
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <input type="hidden" name="cms[content]" id="myContent">
  <input type="hidden" value="<?php echo htmlentities($cms->content); ?>" id="setcontent">
  	<button type="button" name="update" class="btn btn-warning" onclick="getContent(); object.resetParams().setForm('#cmsForm').load();">Save</button>
</form>

<script>
  initSample();
  function getContent() {
    var data = CKEDITOR.instances.editor.getData();
    document.getElementById("myContent").value = data;

  }
  var setdata =  document.getElementById("setcontent").value;
  CKEDITOR.instances['editor'].setData(setdata);
</script>