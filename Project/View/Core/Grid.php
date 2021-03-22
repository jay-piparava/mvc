<?php $rows = $this->getCollection();?>
<?php $columns = $this->getColumns();?>
<?php $actions = $this->getActions();?>
<?php $status = $this->getStatus();?>
<?php $buttons = $this->getButtons();?>
<?php $filters = $this->getFilters();?>
<?php $filterButtons = $this->getFilterButtons();?>

<div class="container">
	<h1><?=$this->getTitle();?></h1>
    <?php if ($buttons): ?>
        <hr>
        <?php foreach ($buttons as $kay => $button): ?>
            <a class="<?=$button['class']?> float-right mb-3" href="javascript:void(0)" onclick="<?=$this->getButtonUrl($button['method']);?>" ><?php echo $button['label'] ?></a>
        <?php endforeach;?>
    <?php endif;?>
</div>
<form id="filter" action="<?php echo $this->getUrl()->getUrl('filter', 'Admin_Filter'); ?>" method='post'>
<div class="container">
<table class="table">
  <thead>
    <tr>
    <?php if ($filters): ?>
      <?php foreach ($filters as $key => $filter): ?>
          <th scope="col"><input type="text" class="<?php echo $filter['class']; ?>" name="<?php echo $filter['name'] ?>" style="<?php echo $filter['style'] ?>" value="<?php echo $filter['value'] ?>" placeholder="<?php echo $filter['placeholder'] ?>"></th>
      <?php endforeach;?>
    <?php endif?>
    <?php if ($filterButtons): ?>
      <?php foreach ($filterButtons as $key => $filters): ?>
          <th><?php if ($filters['ajax']): ?>
              <td><a class="<?php echo $filters['class']; ?>" href="javascript:void(0);" onclick="object.resetParams().setForm('#filter').load();"><?php echo $filters['label'] ?></a></td>
            <?php else: ?>
              <td><a class="<?php echo $filters['class']; ?>" ><?php echo $filters['label'] ?></a></td>
            <?php endif;?>
          </th>
      <?php endforeach;?>
      <td><button type='button' class="btn btn-outline-danger" onclick="setText(); object.resetParams().setForm('#filter').load();	">Clear</button></td>
    <?php endif?>
    </tr>
    <tr>
      <?php foreach ($columns as $key => $column): ?>
          <th scope="col"><?php echo $column['label'] ?></th>
      <?php endforeach;?>

	  <?php if ($status): ?>
          <th scope="col">Status</th>
      <?php endif?>
      <?php if ($actions): ?>
        <?php foreach ($actions as $key => $action): ?>
          <th scope="col"><?php echo $action['label'] ?></th>
        <?php endforeach;?>
      <?php endif?>
    </tr>
  </thead>
  <tbody>
  <?php if ($rows): ?>
    <?php	foreach ($rows->getData() as $row): ?>
    <tr>
        <?php foreach ($columns as $kay => $column): ?>
          <td><?php echo $this->getFieldValue($row, $column['field']) ?></td>
        <?php endforeach;?>

		<?php if ($status): ?>
            <?php if ($status[0]['ajax']): ?>
				<?php if ($row->status == '1'): ?>
              <td><a class="<?php echo $status[0]['class']; ?>" href="javascript:void(0);" onClick="<?=$this->getMethodUrl($row, $status[0]['method'])?>"><?php echo $status[0]['label'] ?></a></td>
			  <?php else: ?>
				<td><a class="<?php echo $status[1]['class']; ?>" href="javascript:void(0);" onClick="<?=$this->getMethodUrl($row, $status[1]['method'])?>"><?php echo $status[1]['label'] ?></a></td>
			  <?php endif;?>
            <?php else: ?>
              <td><a class="<?php echo $action['class']; ?>" href="<?=$this->getMethodUrl($row, $action['method'], false)?>"><?php echo $action['label'] ?></a></td>
            <?php endif;?>

        <?php endif;?>

        <?php if ($actions): ?>
          <?php foreach ($actions as $key => $action): ?>
            <?php if ($action['ajax']): ?>
              <td><a class="<?php echo $action['class']; ?>" href="javascript:void(0);" onClick="<?=$this->getMethodUrl($row, $action['method'])?>"><?php echo $action['label'] ?></a></td>
            <?php else: ?>
              <td><a class="<?php echo $action['class']; ?>" href="<?=$this->getMethodUrl($row, $action['method'], false)?>"><?php echo $action['label'] ?></a></td>
            <?php endif;?>
         <?php endforeach;?>
        <?php endif;?>

    </tr>
    <?php endforeach?>
  <?php else: ?>
      <tr><td colspan="10" align="center"><b>No Data Found...</b></td></tr>
  <?php endif?>
  </tbody>
</table>
</div>
</form>

<script>
  function setText(){
  //document.getElementsByClassName('clear');
  $(".clear").each(function(){
    $(this).val('')
  });
}
</script>