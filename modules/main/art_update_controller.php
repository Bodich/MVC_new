 
<?php
   if(isset($_GET['res_art_add'])) echo 'Редагування статті пройшло успішно!';
 if(!isset($POST["id"]))
     {
         $art_controller->art_select_to_update($POST);
         $res = $art_controller->art_choose_redact_array; 
          
      }
      
     elseif(isset($POST["id"]) && empty($POST["title"]))
     {
        $art_controller->art_redact_to_update($POST);
        $res = $art_controller->art_redact_array; 
    
     }
    elseif(isset($POST["id"]) && !empty($POST["title"]))
       {
       
        $art_controller->art_make_update($POST);
        unset($POST['id']);
       }
     
     
