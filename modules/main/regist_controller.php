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
        function put_user_to_db ($log,$pass,$email){
                  $date_reg = time();
                  $date_last_log = time();
                  $sql = "INSERT INTO users (
                                            name,
                                            pass,
                                            email,
                                            date_reg,
                                            date_last_log
                                                ) VALUES (
                                                    '$log',
                                                    '$pass',
                                                    '$email',
                                                    '$date_reg',
                                                    '$date_last_log'
                                                         )";
                  
                 $res = mysql_query($sql)  or die (mysql_error()); 
               if($res) {$_SESSION['user'] = $log; 
                   header('location:?type=regist&res=true');  
                }  
              }
       
       
       if (empty($error_msg)){
                put_user_to_db($POST["login"],$POST["pass"],$POST["email"]);
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

