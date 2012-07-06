<?php
  if (isset($_GET['res'])){echo 'Update sucesfull';}
   
  function get_user_data(){
      $sql = "SELECT 
                   status
                        FROM users WHERE id ='".$_SESSION['user_id']."'";
       $res = mysql_query($sql)  or die (mysql_error());       
       $res = mysql_fetch_assoc($res);
       
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
         
  
       $res = mysql_query($sql)  or die (mysql_error());       
       $res = mysql_fetch_assoc($res);
         return $res;
        
    }
    $res = get_user_data();
   
    //echo '<pre>';
    //print_r($res);//exit;
     
  function  make_update($POST){
    if (!empty($_FILES['uploadfile']['tmp_name'])){
         
     copy($_FILES['uploadfile']['tmp_name'],'skins/images/'.$_SESSION['user_id'].'.jpeg');
         $img_resize = new img_resize('skins/images/'.$_SESSION['user_id'].'.jpeg'); 
         $infoResize = $img_resize->resize(150,150,'skins/images/',$_SESSION['user_id']);
         $avatar = 'skins/images/'.$_SESSION['user_id'].'.jpeg'; 
         $sql = "UPDATE users 
                            SET 
                              avatar  = '$avatar' 
                                WHERE id='".$_SESSION['user_id']."'";
            $res = mysql_query($sql)  or die (mysql_error());
      }
      extract($POST);
         $sql = "UPDATE users 
                            SET 
                              name  = '$name',
                              email = '$email',
                              pass  = '$pass' 
                                     WHERE id='".$_SESSION['user_id']."'";
          
        $res = mysql_query($sql)  or die (mysql_error());
      $_SESSION['user'] = $POST['name'];
      
             header('location:?type=profile&res=true');
   } 
    if (($POST['make_update'] == 1)) {make_update($POST);}
    
    function  make_dell(){
      unlink('skins/images/'.$_SESSION['user_id'].'.jpeg'); 
        $sql = " DELETE FROM 
                            users
                                 WHERE id='".$_SESSION['user_id']."'";
        $res = mysql_query($sql)  or die (mysql_error());
        unlink('skins/images'.$_SESSION['user_id'].'.jpeg');
         
    }
    if (($POST['make_dell'] == 1)) {make_dell();unset($_SESSION['user']);
      header('location:?type=preView');
    };
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

