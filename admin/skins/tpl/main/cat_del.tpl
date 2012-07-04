 <?php if(!isset($POST['id'])){ ?>
<form action="<?=$self?>?do=cat&action=del" method="POST">
    <table  border="1"> 
   <?=drawTableH($res, 3, 0)?>
  </table><br><br>
  <input type="hidden" name="cat_num"  value="<?=$res[0]['cat_num']?>"/>
  <input class='btn btn-success' type="submit" value="Видалити категорію"/> 
</form>
<?php } ?> 