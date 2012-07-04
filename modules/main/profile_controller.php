<?php
  
  function get_user_data(){
         $sql = "SELECT 
                        name,
                        pass,
                        email,
                        date_reg,
                        date_last_log
                           FROM users WHERE name ='".$_SESSION['user']."'";
  
       $res = mysql_query($sql)  or die (mysql_error());       
       $res = mysql_fetch_assoc($res);
         return $res;
    }
    $res = get_user_data(); 
    
   
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

