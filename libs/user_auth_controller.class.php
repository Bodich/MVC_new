<?php
 class user_auth_controller{
     
     
     public function chek_user_to_autorize($POST) {
         extract($POST);
         print_r($POST);
         $error_ms = '';
        $sql = "SELECT    
                          name,
                          pass,
                          email,
                          status
                          FROM users WHERE name ='".$login_a."'";
    
        $res = mysql_query($sql)  or die (mysql_error()); 
          if (!mysql_num_rows($res) > 0){$error_ms .= 'No such user <br />';}else{
             $res = mysql_fetch_assoc($res);
                      if ($res['pass'] !== $pass){
                          $error_ms .= 'Password   is incorect <br />';
                      } elseif(empty ($error_ms)){
                          
                      $res = mysql_fetch_assoc($res);
                                 $_SESSION['user'] = $log;
                                 $_SESSION['user_id'] = $res['id']; 
                                 $_SESSION['status'] = $res['status'];
                                   $now = time();
                           $sql = "UPDATE users 
                                       SET 
                                         date_last_log  = '$now' 
                                              WHERE id='".$_SESSION['user_id']."'";     
                           $res = mysql_query($sql)  or die (mysql_error());
                                }
              } 
      return $error_ms; 
     }
      public function chek_user_to_register() {
         
     }
      public function put_user_register_to_db() {
         
     }
 }
 
