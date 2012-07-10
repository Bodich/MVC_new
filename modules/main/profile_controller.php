<?php
  if (isset($_GET['res'])){echo PROFILE_UPDATE_OK;}
   
  function get_user_data(){
      $sql = "SELECT 
                   status
                        FROM users WHERE id ='".$_SESSION['user_id']."'";
      // $res = mysql_query($sql)  or die (mysql_error());       
      // $res = mysql_fetch_assoc($res);
      $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'vertrigo');
       $column = $db->query($sql);
       $res = $column->fetch(PDO::FETCH_ASSOC);
       
       $status = $res['status'];
      $sql =    "SELECT u.name,
                        u.pass,
                        u.email,
                        u.avatar,
                        u.status,
                        u.date_reg,
                        u.date_last_log,
                                p.status,
                                p.change_status,
                                p.del_users,
                                p.update_articles,
                                p.del_artikles,
                                p.see_artikles
                    FROM users u
                        JOIN
                         previlegius p 
                    WHERE  u.id='".$_SESSION['user_id']."' AND p.status = '$status'";
         
       $column = $db->query($sql);
       $res = $column->fetch(PDO::FETCH_ASSOC);
     //  $res = mysql_query($sql)  or die (mysql_error());       
     //  $res = mysql_fetch_assoc($res);
         return $res;
        
    }
    
    $res = get_user_data();
   
    //echo '<pre>';
    //print_r($res);//exit;
     
  function  make_update($POST){
      $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'vertrigo');
    if (!empty($_FILES['uploadfile']['tmp_name'])){
         
     copy($_FILES['uploadfile']['tmp_name'],'skins/images/'.$_SESSION['user_id'].'.jpeg');
         $img_resize = new img_resize('skins/images/'.$_SESSION['user_id'].'.jpeg'); 
         $infoResize = $img_resize->resize(150,150,'skins/images/',$_SESSION['user_id']);
         $avatar = 'skins/images/'.$_SESSION['user_id'].'.jpeg'; 
         $sql = "UPDATE users 
                            SET 
                              avatar  = '$avatar' 
                                WHERE id='".$_SESSION['user_id']."'";
            $column = $db->query($sql);
            $res = $column->fetch(PDO::FETCH_ASSOC);
        // $res = mysql_query($sql)  or die (mysql_error());
      }
      extract($POST);
         $sql = "UPDATE users 
                            SET 
                              name  = '$name',
                              email = '$email',
                              pass  = '$pass' 
                                     WHERE id='".$_SESSION['user_id']."'";
         $column = $db->query($sql);
         $res = $column->fetch(PDO::FETCH_ASSOC); 
      //  $res = mysql_query($sql)  or die (mysql_error());
      $_SESSION['user'] = $POST['name'];
      
             header('location:?type=profile&res=true');
   } 
    if (($POST['make_update'] == 1)) {make_update($POST);}
    
    function  make_dell(){
        $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'vertrigo');
        if (file_exists('skins/images/'.$_SESSION['user_id'].'.jpeg')){
          unlink('skins/images/'.$_SESSION['user_id'].'.jpeg');
       } 
        $sql = " DELETE FROM 
                            users
                                 WHERE id='".$_SESSION['user_id']."'";
        // $column = $db->query($sql);
       //  $res = $column->fetch(PDO::FETCH_ASSOC);
      //$res = mysql_query($sql)  or die (mysql_error());
        $del = $db->exec($sql);
          
    }
    if (($POST['make_dell'])) {
                echo 'sdsds';make_dell();unset($_SESSION['user']);
      header('location:?type=preView');
    };
    
     function show_profile (){
         $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'vertrigo');
        $sql =    "SELECT  
                            name,
                            avatar,
                            status,
                            date_reg,
                            date_last_log
                            
                     FROM users 
                            WHERE id='".$_GET['profile_id']."'";
         $column = $db->query($sql);
        return $res = $column->fetch(PDO::FETCH_ASSOC); 
    }
    if(isset($_GET['profile_id'])){
       $res = show_profile();
    }