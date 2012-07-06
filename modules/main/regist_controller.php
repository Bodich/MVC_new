<?php
  
 if (isset($_GET['res'])){echo 'Registration sucesfull';}
 
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

    if (isset($POST['email'])){ 
      $error_msg = check_data($POST['login'], $POST['pass'],$POST['confirm_pass'],$POST['email']);   
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
       
       
       if (empty($error_msg)){
            
           foreach ($POST as $v) {
               $POST[$v] = trim($v);
           }
                put_user_to_db($POST);
           
                }
             
        }   
              
    // $error_msg = 'Hello '.$POST['login'];
    
     
    
    /*
    
    $res = mysql_fetch_assoc($res);
                      if ($res['pass'] !== $pass){
                          $error_msg .= 'Password is incorect <br />';   
                      } 
   function res2array($data){
            while($row = mysql_fetch_assoc($data)){
                $arr[] = $row;
            }
            return $arr;  
}   
    */

