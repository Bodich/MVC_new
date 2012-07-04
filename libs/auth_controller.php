<?php
  
 function chek_users($log,$pass){
        $users = array(
            'a'=>'1'
                 );
                if (array_key_exists ($log, $users) && $users[$log] == $pass){
                  
                $_SESSION['user'] = 'admin';} 
                else return $error =  'Ошибка авторизации';
     }
if (isset($POST['login'])){
    $error = chek_users($POST['login'],$POST['pass']);
        }
        
  if(isset($_SESSION['user']))
         $hello_admin = 'здравсвуйте админ'; 

            if (isset($POST['exit'])){
            unset ($_SESSION['user']);
                }
  