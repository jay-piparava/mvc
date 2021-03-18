<table width="100%" height="100%">
  <tr height="5%">
    <td colspan="3">
      <?php echo $this->getChild('header')->toHtml(); ?>
    </td>
  </tr>
  <tr>
    <td width ='20%'>
        <?php echo $this->getChild('sidebar')->toHtml(); ?>
    </td>
    <td width="60%" valign="top">
      <?php echo $this->getChild('message')->toHtml(); ?>
      <?php echo $this->getChild('content')->toHtml(); ?>
    </td>
    <td width="20%">
      <?php ?>
    </td>
  </tr>
   <tr width = '100%'  height="10%">
    <td colspan="3">
      <?php echo $this->getChild('footer')->toHtml(); ?>
    </td>
  </tr>
</table>