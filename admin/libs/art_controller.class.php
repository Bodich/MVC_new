<?php

 class art_controller extends db_action{
     public $art_choose_del_array = array();
     public $res_cat_list = array();
     public $art_redact_array  = array();
     public $art_choose_redact_array = array();
     public $art_pre_text;
     public $art_keys;
     public $art_des;

     function art_make_update($POST){
            extract($POST,EXTR_OVERWRITE);
            $sql = "UPDATE data 
                        SET 
                            cat_num =  $cat_num,                
                            title=    '$art_title',
                            pre_text= '$pre_text',
                            main_text='$main_text',
                            art_keys= '$art_keys',
                            art_des=  '$art_des' 
                                         WHERE id='$id'";

            $res = $this->db_UPDATE($sql);
            if($res){header('location:'.$self.'?do=art&action=update&res_art_update=true');}
            else echo 'Пмилка редагування статті ';
    }
   
    function art_make_keys($POST){ 
        extract($POST);
        $arr = explode(' ', $art_title);
        $art_keys = $arr[0].' '.$arr[1].','.$arr[3].'';

        $arr0 = explode('.', $main_text);
        $arr1 = explode(' ', $arr0[3]);
        $art_keys .= ' '.$arr1[0].', '.$arr1[1].' '.$arr1[2];

        $art_keys = strip_tags($art_keys);
        $this->art_keys = $art_keys;
        
        
    }
    
    function art_make_des($POST){
        extract($POST);
        $arr = explode('.', $main_text);
        $this->art_des = $arr[0];
    }
    
    function art_make_pre_text($POST){
        extract($POST);
    $arr = explode('.', $main_text);
    $pre_text = $arr[0].'. '.$arr[1].'. '.$arr[3].'. '.$arr[4].'. '.$arr[5];
    $this->art_pre_text = $pre_text;    
    }


    function art_add($POST){
       extract($POST);
       print_r($POST);
       $sql = "INSERT INTO data (
                                  title,
                                  main_text,
                                     ) VALUES (
                                                '$title',
                                                '$main_text',
                                                    )";
      $res = mysql_query($sql)  or die (mysql_error('sss'));  
      if($res){echo 'thank you for add articles' ;}
      else echo 'Пмилка запису статті в базу';
   }
    
   function art_select_to_update(){ 
            $data = array();
            $sql = 'SELECT  id,
                    title  
                    FROM `data` ';
                $res = $this->db_SELECT($sql);
                $this->art_choose_redact_array = $res;
                
    }
    
    function art_redact_to_update($POST){ 
                $id = $POST["id"];
                $sql = "SELECT  id,
                            title,
                            cat_num,
                            pre_text,
                            main_text,
                            art_keys,
                            art_des  
                            FROM `data` WHERE  id ='$id' ";
                $res = $this->db_SELECT($sql);
                $this->art_redact_array = $res; 
        }
    
        function res_cat_list($POST){
            $sql = 'SELECT `cat_title`,
                           `id`,
                           `cat_num`
                            FROM `categories` ORDER BY `id` DESC';
            $res = $this->db_SELECT($sql);
                $this->res_cat_list = $res;
        }
        
        function art_choose_to_del(){
            $sql = 'select  d.title,
                            d.id  ,
                            d.cat_num  ,
                            c.cat_title
                               from data d 
                             inner join categories c using (cat_num)
                                                    order by d.id desc';
            
            
            $res = $this->db_SELECT($sql);
            $this->art_choose_del_array = $res;
        }
         function art_make_del($id){
              $sql = "DELETE   
                        FROM data WHERE id = '$id' ";
             $res = $this->db_DELETE($sql);
             if($res){header('location:'.$self.'?do=art&action=del&res_art_del=true');}
         }
         
 } 
?>
