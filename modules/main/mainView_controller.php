<?php
    $sql = "SELECT 
                id,
                 $field_t,
                 $field_m_text 
                    FROM tmp_table WHERE id = ".$GET['id']."";
    
   $column = $db->query($sql);
   $mainView = $column->fetch(PDO::FETCH_ASSOC);
   if(!isset($_SESSION['user_id'])){$_SESSION['user_id']=0;}
   if(isset($POST['vote_dell'])){
      $sql = "DELETE 
                       FROM art_rait WHERE user_id = ".$_SESSION['user_id']."";
         $dell = $db->exec($sql);
 }
    if (isset($_POST['com_title'])){
         add_coment();
    } 
        if(isset($_POST['comm_dell'])){
      dell_coment($_POST['comm_dell']);
  } 
   
         if(isset($POST['vote'])){
           $msg = put_vote($GET,$POST);
        }
       $sql = "SELECT 
                       art_id,
                       user_estimation
                                FROM art_rait WHERE user_id ='".$_SESSION['user_id']."' AND art_id = '".$_GET['id']."'";
          $column = $db->query($sql);
          $is_voted = $column->fetch(PDO::FETCH_ASSOC);
  
     //if(!$is_voted)echo 'не голосував';
     function get_raiting($GET){ 
         $msg = '';
         $raiting = '';
            $sql = "SELECT 
                            SUM(user_estimation) 
                                        FROM art_rait WHERE art_id = ".$GET['id']."";
        $res = mysql_query($sql) or die(mysql_error());
        $row1 = mysql_fetch_array($res);

            $sql = "SELECT 
                        COUNT(*)
                            FROM art_rait WHERE art_id = ".$GET['id']."";
            $res = mysql_query($sql) or die(mysql_error());
            $row = mysql_fetch_array($res);
        if(!$row[0]){$msg = 'За цей метріал ще ніхто не голосував';}else{     
            $raiting =round($row1['SUM(user_estimation)']/$row[0]);
        }
            return $r=array($row[0],$raiting,$msg) ;
    }
   $r = get_raiting($GET);
    
    function put_vote($GET,$POST) {
       $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'vertrigo');
        $sql = "  INSERT INTO art_rait (
                                         art_id,
                                         user_estimation,
                                         user_id 
                                            ) VALUES (
                                                    ".$GET['id'].",
                                                    ".$POST['vote'].",
                                                    ".$_SESSION['user_id']."
                                                         ) "; 
                                  
         $insert = $db->exec($sql);
         if($insert){$msg = 'дякуємо за ваш голос';}  else {$msg = '';}
         return $msg;
   }
  
   function get_art_coments($GET){
       $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'vertrigo');
       $sql = "SELECT
                        id,
                        user_id,
                        title_coment,
                        text_coment,
                        date
                                FROM comments  WHERE art_id = '".$GET['id']."'ORDER BY id DESC";
     $com_data = $db->query($sql, PDO::FETCH_ASSOC);
     return $com_data;
   }
    $com_data = get_art_coments($GET);
   
     function add_coment(){
         $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'vertrigo');
         $date = time();
         $sql = "INSERT INTO comments (
                                         art_id,
                                         user_id,
                                         title_coment, 
                                         text_coment,
                                         date
                                            ) VALUES (
                                                    '".$_GET['id']."',
                                                    '".$_SESSION['user_id']."',
                                                    '".$_POST['com_title']."',
                                                    '".$_POST['com_text']."',
                                                    '$date'
                                                          )";  
        
          $insert = $db->exec($sql);
       if($insert){}  else {}
     }
  
     function dell_coment($id){
         $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'vertrigo');
         
         $sql = "DELETE 
                     FROM  comments WHERE id='$id'";
      $dell = $db->exec($sql);
       // if($insert){}  else {}
  }
 