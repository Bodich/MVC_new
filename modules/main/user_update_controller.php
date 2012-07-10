  <?php
  
  if (isset($_GET['dell'])){echo PROFILE_DELL_OK;}
  if (isset($_GET['update'])){echo PROFILE_UPDATE_OK;} 
  if($_SESSION['status'] == 'admin'){
         $sql =  "SELECT *  
                        FROM users ";
              //$res_u = mysql_query($sql)  or die (mysql_error());       
             //  $users_array = res2array($res_u);
               $users_array  = $db->query($sql, PDO::FETCH_ASSOC);
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'vertrigo');           
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
             $column = $db->query($sql);
             $res = $column->fetch(PDO::FETCH_ASSOC);
         
              $sql = "SELECT 
                        status 
                            FROM previlegius";
              $res_p = $db->query($sql, PDO::FETCH_ASSOC);
             //$res_p = mysql_query($sql)  or die (mysql_error()); 
             //$res_p = res2array($res_p); 
            }
     
     
     function  make_update($POST){
         $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'vertrigo');
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
             $column = $db->query($sql);
             $res = $column->fetch(PDO::FETCH_ASSOC);
           // $res = mysql_query($sql)  or die (mysql_error());
      }
      echo $status; echo $POST['id'];
         $sql = "UPDATE users 
                            SET 
                              name   = '$name',
                              email  = '$email',
                              pass   = '$pass',
                              status = '$status'
                                          WHERE id='$id'";
          $column = $db->query($sql);
          $res1 = $column->fetch(PDO::FETCH_ASSOC);
       // $res1 = mysql_query($sql)  or die (mysql_error());
         header('location:?type=user_update&update=true');
   } 
    if (($POST['make_update'] == 1)) {
        
         make_update($POST);
     }
     
     function  make_dell($POST){
         $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'vertrigo'); 
       if (file_exists('skins/images/'.$POST["id"].'.jpeg')){
          unlink('skins/images/'.$POST["id"].'.jpeg');
       } 
        $sql = " DELETE FROM 
                            users
                                 WHERE id='".$POST["id"]."'";
         $del = $db->exec($sql);
          
       // $res = mysql_query($sql)  or die (mysql_error());
      }
    if (($POST['make_dell'] == 1))   { make_dell($POST);
      header('location:?type=user_update&dell=true');
    }
  //echo '<pre>';
    //  print_r($res);
 }