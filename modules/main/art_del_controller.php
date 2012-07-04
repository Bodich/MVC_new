<script>
    doit="<? echo $GET['do']; ?>";  
    action = "<? echo $GET['action']; ?>";
 </script>
<?php
 if(isset($_GET['res_art_del']))echo 'Видалення статті пройшло успішно!<br><br>';
 if(!isset($POST['id']))
   {
        $art_controller->art_choose_to_del();
        $res = $art_controller->art_choose_del_array;
         
   }
   else 
       $art_controller->art_make_del($POST['id']);
?>
