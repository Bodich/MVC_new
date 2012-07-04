<?php
  
 function chek_users($log,$pass){
        $error_msg = '';
        $sql = "SELECT    
                          name,
                          pass,
                          email
                          FROM users WHERE name ='".$log."'";
        
    $res = mysql_query($sql)  or die (mysql_error()); 
          if (mysql_num_rows($res) > 0){
             $res = mysql_fetch_assoc($res);
                      if ($res['pass'] !== $pass){
                          $error_msg .= 'Password   is incorect <br />';
                      
                          
                      } else{$_SESSION['user'] = $log;}
             }else {$error_msg .= 'No such user <br />'; }
      return $error_msg; 
       }
       
       
if (isset($POST['login'])){
    $error = chek_users($POST['login'],$POST['pass'],$POST['email']);
        }
        
  if(isset($_SESSION['user'])){
      $hello_admin = 'здравсвуйте '.$_SESSION['user'];
      $hello_admin .= "<br /><a href ='?type=profile'>Profile</a>";
      } 

  if (isset($POST['exit'])){
       unset ($_SESSION['user']);
      }
  