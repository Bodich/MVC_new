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
       
       function check_data($log,$pass,$confirm_pass,$email){
        $error_msg = '';
             if($pass !== $confirm_pass){$error_msg .= 'Attanshin Passwords  mismahed <br />';}else{
                $sql = "SELECT 
                                name,
                                pass,
                                email
                                FROM users WHERE name ='".$log."' AND  email ='".$email."'";
                    $res = mysql_query($sql)  or die (mysql_error()); 
                  
             if (mysql_num_rows($res) > 0){
                    $error_msg .= 'Attanshin Login or email olredy set <br />'; 
                  } 
             }
             return $error_msg; 
    }
    
      function put_user_to_db ($POST){
             
            extract($POST);
                  $date_reg = time();
                  $date_last_log = time();
                  $sql = "INSERT INTO users (
                                            name,
                                            pass,
                                            email,
                                            avatar,
                                            status,
                                            date_reg,
                                            date_last_log
                                                ) VALUES (
                                                    '$login',
                                                    '$pass',
                                                    '$email',
                                                    '$avatar',
                                                    '$status',
                                                    '$date_reg',
                                                    '$date_last_log'
                                                         )";
                  
                 $res = mysql_query($sql)  or die (mysql_error()); 
               if($res) { $sql = "SELECT 
                                    id,
                                    name
                                     FROM users WHERE name ='".$login."'"; 
                   $res = mysql_query($sql)  or die (mysql_error()); 
                   $res = mysql_fetch_assoc($res);
                                  $_SESSION['user_id'] = $res['id']; 
                           }      $_SESSION['user'] = $login;
                                  
                       header('location:?type=regist&res=true');  
                
              }
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
