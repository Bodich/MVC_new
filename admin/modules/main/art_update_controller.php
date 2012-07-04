<script>
    doit="<? echo $GET['do']; ?>";  
    action = "<? echo $GET['action']; ?>";
 </script>
<?php
if(isset($_GET['res_art_update']))echo 'Редагування статті пройшло успішно!';
if(!isset($POST["id"]))
     {
         $art_controller->art_select_to_update($POST);
         $res = $art_controller->art_choose_redact_array; 
      }
     elseif(isset($POST["id"]) && empty($POST["art_keys"]))
     {
        $art_controller->art_redact_to_update($POST);
        $res = $art_controller->art_redact_array; 

        $art_controller->res_cat_list($POST);
        $res_cat_list = $art_controller->res_cat_list;
     }
    elseif(isset($POST["id"]) && !empty($POST["art_keys"]))
       {
        $art_controller->art_make_update($POST);
       }
     
     ?>
