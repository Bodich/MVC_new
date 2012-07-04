<script>
    doit="<? echo $GET['do']; ?>";  
    action = "<? echo $GET['action']; ?>";
 </script>
<?php
if(isset($_GET['res_cat_add']))echo 'Додавання категорії пройшло успішно!';
 
 if (!isset($POST['cat_title'])){
     $sql = "SELECT cat_num 
                        FROM categories";
     $res = $db_action->db_SELECT($sql);
            foreach ($res as  $item){
                $arr[] = $item['cat_num'];
            } 
     $cat_num = max($arr)+1;
  }else {
     $cat_controller->cat_add($POST);
 }
?>