 
<?php
if (isset($POST['title'])){
  if ($_SESSION['status'] == 'redactor' or $_SESSION['status'] == 'admin'){
      // $db_connect->connect();
       $art_controller->art_add($POST);
        
  }
    }
 
 