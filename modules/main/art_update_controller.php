 
<?php
 //print_r($POST);
   if(isset($_GET['res_art_add'])) echo ART_UPDATE_OK ;
 
   
    if($_SESSION['status'] == 'redactor' or $_SESSION['status'] == 'admin'){
   if (!isset($POST["id"])){
         $art_controller->art_select_to_update($POST);
         $res = $art_controller->art_choose_redact_array; 
   }
     
      if(!empty($POST["id"]) && !empty($_POST["art_update"])){
          
        $art_controller->art_redact_to_update($POST);
        $res = $art_controller->art_redact_array; 
      }
    elseif(isset($POST["id"]) && !empty($POST["title"])) {
       $art_controller->art_make_update($POST);
        unset($POST['id']);
       }
  
       
    }
