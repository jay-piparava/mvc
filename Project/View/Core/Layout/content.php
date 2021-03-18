<div id="content">
<?php
foreach ($this->getChildren() as $key => $value) {
    echo $this->getChild($key)->toHtml();
}
?>
</div>
<script type="text/javascript">
	var object = new Base();
</script>