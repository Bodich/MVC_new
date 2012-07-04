 
<?php if(!isset($POST['id'])){ ?>
<form action="?do=art&action=update" method="POST">
    <table  border="1"> 
   <?php echo art_drawTableH($res, 3, 0) ?>
  </table><br><br><br><br>
  <input class='btn btn-success' type="submit" value="Вибрати Статтю"/> 
</form>
<?php   } else {echo $POST['id'];?>

<form id=""  action="?do=art&action=update" method="POST">
    <input type="hidden" name="id" value="<?php echo $res[0]['id']?>"
     <p>title :</p>
 <textarea class="round_shadow"  cols="70" rows="5"  name="title" ><?php echo $res[0]['title']?></textarea><br>
    <p>text :</p>
      <textarea class="round_shadow"  cols="70" rows="5"   name="main_text" ><?php echo $res[0]['main_text']?></textarea><br><br>
   <button class='btn btn-success' type="submit">Редагувати Рецепт</button>
</form>   

<?php } ?>


 
 
