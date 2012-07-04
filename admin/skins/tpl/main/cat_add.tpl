 
<form id="cat_add"  action="<?=$self?>?do=cat&action=add" method="POST">
    <p>Назва категорії :</p>
    
    <input class="round_shadow" id ="cat_name" name="cat_title" size="70" /><br><br>
    <p>Ключові слова (3-5 словосполучень що характеризують категорію. кожне в новому рядку)</p>
    <textarea class="round_shadow" name="cat_keys" cols="70" rows="7" ></textarea><br><br>
    <p>Опис категорії (речення яке характерізую дану категорію)</p>
        <textarea class="round_shadow"  name="cat_des" cols="70" rows="7"  ></textarea><br><br>
     <input name="cat_num" type="hidden" value="<?=$cat_num;?>" /> 
        <button class='btn btn-success' type="submit">Додати категорію</button>
</form>     