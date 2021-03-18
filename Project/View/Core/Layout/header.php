<!DOCTYPE html>
<html>
<head>
  <title>E-Commerce</title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script src="<?php echo $this->baseUrl("skin/Admin/ckeditor.js"); ?>"></script>
<script src="<?php echo $this->baseUrl("skin/Admin/sample.js"); ?>"></script>
<script src="<?php echo $this->baseUrl("Skin/Admin/Js/jquery.js"); ?>"></script>
<script src="<?php echo $this->baseUrl("Skin/Admin/Js/mage.js"); ?>"></script>
<body id="main">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <h1><a class="navbar-brand" href="">.....JAY.....</a></h1>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

       <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
          	<li class="nav-item active">
          	   	<a class="nav-link" href="http://localhost/Project">Home</a>
          	</li>
           	<li class="nav-item active">
             		 <a class="nav-link" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Admin_Product', null, true) ?>').resetParams().load();">Product</a>
            	</li>
          	<li class="nav-item active">
              	<a class="nav-link" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Admin_Category', null, true) ?>').resetParams().load();">Category</a>
          	</li>
            	<li class="nav-item active">
              	<a class="nav-link" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Admin_Customer', [], true); ?>').resetParams().load();">Customer</a>
            	</li>
              <li class="nav-item active">
                <a class="nav-link" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Admin_CustomerGroup', [], true); ?>').resetParams().load();" >Customer Group</a>
              </li>
            	<li class="nav-item active">
              	<a class="nav-link" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Admin_Payment', [], true); ?>').resetParams().load();">Payment</a>
            	</li>
            	<li class="nav-item active">
              	<a class="nav-link" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Admin_Shiping', [], true); ?>').resetParams().load();" >Shipping</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Admin_Cms', [], true); ?>').resetParams().load();">CMS Page</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Admin_Admin', [], true); ?>').resetParams().load();">Admin</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Admin_Attribute', [], true); ?>').resetParams().load();" >Attribute</a>
              </li>
          </ul>
        </div>
        </nav>
    <br><br>