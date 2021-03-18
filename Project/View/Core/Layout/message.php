<div class="container">
	<?php
	 if($success = $this->getMessage()->getSuccess()){ ?>
	<div class='alert alert-success fadeoutmsg'>
		<?php echo $success; ?>
	</div>
	<?php $this->getMessage()->clearMessage(); ?>
	<?php } ?>
	<?php if($failiur = $this->getMessage()->getFailure()){  ?>
	<div class='alert alert-danger fadeoutmsg'>
		<?php echo $failiur ?>
	</div>
	<?php $this->getMessage()->clearMessage(); ?>
<?php } ?>
</div>

<script type="text/javascript">
	$(".fadeoutmsg").fadeOut(3000);  
</script>