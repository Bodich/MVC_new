 <?php if(!isset($POST['id'])){ ?>
<form action="?do=art&action=del" method="POST">
    <table  border="1"> 
   <?php echo art_drawTableH($res, 3, 0)?>
  </table><br><br>
  <input class='btn btn-success' type="submit" value="Видалити статтю"/> 
</form>
<?php } ?> 