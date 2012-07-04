<script>
    doit="<? echo $GET['do']; ?>";  
    action = "<? echo $GET['action']; ?>";
</script>
<?php
 if(isset($_GET['res_cat_update']))echo 'Редагування категорії пройшло успішно!';
        
 if(!isset($POST["id"]))
     {
         $cat_controller->cat_select_to_update($POST);
         $res = $cat_controller->cat_choose_redact_array; 
     }
 elseif(isset($POST["id"]) && empty($POST["cat_keys"]))
     {
    
    $cat_controller->cat_redact_to_update($POST);
    $res = $cat_controller->cat_redact_array; 
     }
 
 elseif(isset($POST["id"]) && !empty($POST["cat_keys"]))
     {
    $cat_controller->cat_make_update($POST);
     }
 ?>