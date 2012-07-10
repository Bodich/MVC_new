<?php
         
if (isset($POST['login_a']) ){
    $error = $user_auth_controller->chek_user_to_autorize($POST);
    // $error = chek_users($POST['login_a'],$POST['pass'],$POST['email']);
        }
        
  if(isset($_SESSION['user'])){
      $hello_admin = GRITINGS.' '.$_SESSION['user'];
      $hello_admin .= "<br /><br /><a href ='?type=profile'>".PROFILE_ENTER."</a>";
      } 

  if (isset($POST['exit'])){
       unset ($_SESSION['user']);
      unset ($_SESSION['user_id']);
      unset ($_SESSION['status']);
      }
  