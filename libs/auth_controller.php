<?php
  
 function chek_users($log,$pass){
        $error_ms = '';
        $sql = "SELECT    
                          name,
                          pass,
                          email
                          FROM users WHERE name ='".$log."'";
        
    $res = mysql_query($sql)  or die (mysql_error()); 
          if (mysql_num_rows($res) > 0){
             $res = mysql_fetch_assoc($res);
                      if ($res['pass'] !== $pass){
                          $error_ms .= 'Password   is incorect <br />';
                      
                          
                      } else{
                          $sql = "SELECT  id,
                                          status
                                         FROM `users`
                                               WHERE  name ='".$log."'";
                          
                          $res = mysql_query($sql)  or die (mysql_error());
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
                        
                                
             }else {$error_ms .= 'No such user <br />'; }
      return $error_ms; 
       }
       
        
if (isset($POST['login_a']) ){
     $error = chek_users($POST['login_a'],$POST['pass'],$POST['email']);
        }
        
  if(isset($_SESSION['user'])){
      $hello_admin = 'здравсвуйте '.$_SESSION['user'];
      $hello_admin .= "<br /><a href ='?type=profile'>Profile</a>";
      } 

  if (isset($POST['exit'])){
       unset ($_SESSION['user']);
      }
  