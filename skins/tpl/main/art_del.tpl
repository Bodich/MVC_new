 <?php if(!isset($POST['id'])){ ?>
<form action="?do=art&action=del" method="POST">
    <table  border="1"> 
   <?php echo art_drawTableH($res,7,0)?>
  </table><br><br>
  <input class='btn btn-success' type="submit" value="<?php echo ART_DELL_LINK?>"/> 
</form>
<?php } ?> 