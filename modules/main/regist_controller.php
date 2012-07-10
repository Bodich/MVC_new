<?php
  
 if (isset($_GET['res'])){echo 'Registration sucesfull';}
     
   if (isset($POST['email'])){ 
        $error_msg = $user_auth_controller->chek_user_to_regist($POST);
          
        if (empty($error_msg)){
            foreach ($POST as $v) {
               $POST[$v] = trim($v);
             }
               $user_auth_controller->put_user_register_to_db($POST);
             }
          }   
              
     

