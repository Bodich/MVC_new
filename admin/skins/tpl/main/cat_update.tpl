<?php if(!isset($POST['id'])){ ?>
<form action="<?=$self?>?do=cat&action=update" method="POST">
    <table  border="1"> 
   <?=drawTableH($res, 3, 0)?>
  </table><br><br>
  <input class='btn btn-success' type="submit" value="Вибрати категорію"/> 
</form>
<?php }else{?>

<form id="cat_add"  action="<?=$self?>?do=cat&action=update" method="POST">
    <input type="hidden" name="id" value="<?=$res[0]['id']?>"/>
        
    <p>Назва категорії :</p>
    <input class="round_shadow" id ="cat_name" name="cat_title" size="70" value="<?=$res[0]['cat_title']?>" /><br><br>
    <p>Ключові слова (3-5 словосполучень що характеризують категорію. кожне в новому рядку)</p>
    <textarea class="round_shadow" name="cat_keys" cols="70" rows="7"  ><?=$res[0]['cat_keys']?> </textarea><br><br>
    <p>Опис категорії (речення яке характерізую дану категорію)</p>
        <textarea class="round_shadow"  name="cat_des" cols="70" rows="7"  ><?=$res[0]['cat_des']?> </textarea><br><br>
       
        <button class='btn btn-success' type="submit">Редагувати категорію</button>
</form>  

<?php }?>