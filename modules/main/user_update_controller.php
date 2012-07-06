  <?php
  if (isset($_GET['dell'])){echo 'Delete sucesfull';} 
  if($_SESSION['status'] == 'admin'){
         $sql =  "SELECT *  
                        FROM users ";
            $res_u = mysql_query($sql)  or die (mysql_error());       
               $users_array = res2array($res_u);
               
    if(isset($POST['user_update'])){
        $id = $POST['id'];
            $sql = "SELECT 
                         u.id,
                         u.name,
                         u.pass,
                         u.email,
                         u.avatar,
                         u.status,
                         u.date_reg,
                         u.date_last_log 
                      FROM users u  
                              WHERE   u.id= '$id'";
              $res = mysql_query($sql)  or die (mysql_error()); 
             $res = mysql_fetch_assoc($res); 
         
              $sql = "SELECT 
                        status 
                            FROM previlegius";
             $res_p = mysql_query($sql)  or die (mysql_error()); 
             $res_p = res2array($res_p); 
      // echo '<pre>';
      //print_r($res);      
             
             }
     
     
     function  make_update($POST){
         extract($POST);
     if (!empty($_FILES['uploadfile']['tmp_name'])){
         echo $POST['id'];
     copy($_FILES['uploadfile']['tmp_name'],'skins/images/'.$id.'.jpeg');
                $img_resize = new img_resize('skins/images/'.$id.'.jpeg'); 
                $infoResize = $img_resize->resize(150,150,'skins/images/',$id);
         $avatar = 'skins/images/'.$id.'.jpeg'; 
         $sql = "UPDATE users 
                            SET 
                              avatar  = '$avatar' 
                                         WHERE id='$id.'";
            $res = mysql_query($sql)  or die (mysql_error());
      }
      echo $status; echo $POST['id'];
         $sql = "UPDATE users 
                            SET 
                              name   = '$name',
                              email  = '$email',
                              pass   = '$pass',
                              status = '$status'
                                          WHERE id='$id'";
          
        $res1 = mysql_query($sql)  or die (mysql_error());
         header('location:?type=user_update&update=true');
   } 
    if (($POST['make_update'] == 1)) {
        
         make_update($POST);
     }
     
     function  make_dell($POST){
       if (file_exists('skins/images/'.$POST["id"].'.jpeg')){
          unlink('skins/images/'.$POST["id"].'.jpeg');
       } 
        $sql = " DELETE FROM 
                            users
                                 WHERE id='".$POST["id"]."'";
        $res = mysql_query($sql)  or die (mysql_error());
      }
    if (($POST['make_dell'] == 1))   { make_dell($POST);
      header('location:?type=user_update&dell=true');
    }
  //echo '<pre>';
    //  print_r($res);
 }