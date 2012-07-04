
<?php if(!isset($POST['id'])){ ?>
<form action="<?=$self?>?do=art&action=update" method="POST">
    <table  border="1"> 
   <?=art_drawTableH($res, 3, 0)?>
  </table><br><br><br><br>
  <input class='btn btn-success' type="submit" value="Вибрати Статтю"/> 
</form>
<?php }else{?>


<form id="cat_add"  action="<?=$self?>?do=art&action=update" method="POST">
    <input type="hidden" name="id" value="<?=$res[0]['id']?>"/>
    <p>Назва статті :</p>
    <input class="round_shadow" id ="cat_name" name="art_title" size="140" value="<?=$res[0]['title']?>" /><br><br>
    <p></p>
    <select style="font-size: 20px;" class="round_shadow"  name="cat_num">
         <? foreach($res_cat_list as $item){ 
        if ($item["cat_num"] == $res[0]['cat_num']){
        ?>
        <option selected="selected"   value='<?=$item["cat_num"]?>'><?=$item['cat_title']?></option> 
        <?}else {?>
        <option  value='<?=$item["cat_num"]?>'><?=$item['cat_title']?></option>
        <? } }?>
    </select>

    <p></p>
    <textarea  class="ckeditor" id="editor1" name="main_text" ><?=$res[0]['main_text']?></textarea><br>
    <p>Короткий текст :</p>
    <textarea class="round_shadow"  cols="160" rows="15"  name="pre_text" ><?=$res[0]['pre_text']?></textarea><br>
    <p>Ключові слова :</p>
    <textarea class="round_shadow"  cols="160" rows="3"  name="art_keys" ><?=$res[0]['art_keys']?></textarea><br>
    <p>Короткий опис :</p>
    <textarea class="round_shadow"  cols="160" rows="5"   name="art_des" ><?=$res[0]['art_des']?></textarea><br><br>

    <button class='btn btn-success' type="submit">Редагувати Статтю</button>
</form>   

<?}?>
