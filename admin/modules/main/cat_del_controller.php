<script>
    doit="<? echo $GET['do']; ?>";  
    action = "<? echo $GET['action']; ?>";
 </script>
<?php
 if(isset($_GET['res_cat_del']))echo 'Видалення категорії пройшло успішно!';
 if(!isset($POST['id']))
   {
        $cat_controller->cat_choose_to_del();
        $res = $cat_controller->cat_choose_del_array;
   }
   else 
        $cat_controller->cat_make_del($POST);
 ?>