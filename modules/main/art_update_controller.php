 
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
       function dell_rait($id){
         $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'vertrigo');
           $sql = "DELETE 
                        FROM art_rait WHERE art_id = '$id'";
       $dell = $db->exec($sql);  
       }
     if (isset($_POST['rait_dell'])){
         
         dell_rait($_POST['rait_dell']);
     }  
       
       }
