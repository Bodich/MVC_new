<form id="cat_add"  action="<?=$self?>?do=art&action=add" method="POST">
    <p>Назва статті :</p>
    <input class="round_shadow" id ="cat_name" name="art_title" size="140" /><br><br>
     <p></p>
     <select style="font-size: 20px;" class="round_shadow"  name="cat_num">
            <option value=''>ВИБЕРІТЬ КАТЕГОРІЮ</option>
         <? foreach($res as $item){ ?>
            <option value='<?=$item["cat_num"]?>'><?=$item['cat_title']?></option> 
         <? } ?>
     </select>
     <p></p>
    <textarea  class="ckeditor" id="editor1" name="main_text" > </textarea><br>
  <button class='btn btn-success' type="submit">Додати Статтю</button>
</form>   


  