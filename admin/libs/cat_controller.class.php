<?php

 class cat_controller extends db_action{
     public $cat_choose_redact_array = array();
     public $cat_redact_array = array();
     public $cat_choose_del_array = array();

     function cat_make_update($POST){
            extract($POST,EXTR_OVERWRITE);
            $sql = "UPDATE categories 
                        SET cat_title='$cat_title',
                        cat_keys='$cat_keys',
                        cat_des='$cat_des'
                        WHERE id='$id'";

            $res = $this->db_UPDATE($sql);
            if($res){header('location:'.$self.'?do=cat&action=update&res_cat_update=true');}
    }
   function cat_add($POST){
        extract($POST);
       $sql = "INSERT INTO categories (
                                        cat_title,
                                        cat_num,
                                        cat_keys,
                                        cat_des) VALUES (
                                                '$cat_title',
                                                 '$cat_num',
                                                '$cat_keys',
                                                '$cat_des')";
      $res = mysql_query($sql);
      if($res){header('location:'.$self.'?do=cat&action=add&res_cat_add=true'); }else echo 'dsdsd';
   }
    
   function cat_select_to_update(){ 
            $data = array();
            $sql = 'SELECT  id,
                    cat_title  
                    FROM `categories` ';
                $res = $this->db_SELECT($sql);
                $this->cat_choose_redact_array = $res;
    }
    
    function cat_redact_to_update($POST){ 
                $id = $POST["id"];
                $sql = "SELECT  id,
                            cat_title,
                            cat_num,
                            cat_keys,
                            cat_des  
                            FROM `categories` WHERE  id ='$id' ";
                $res = $this->db_SELECT($sql);
                $this->cat_redact_array = $res; 
        }
 
        function cat_choose_to_del(){
            $sql = 'SELECT `cat_title`,
                           `id`,
                           `cat_num`
                            FROM `categories` ORDER BY `id` DESC';
            $res = $this->db_SELECT($sql);
            $this->cat_choose_del_array = $res;
        }
         function cat_make_del($POST){
              extract($POST);  
              $sql = "DELETE   
                        FROM categories WHERE id = '$id' ";
             $res = $this->db_DELETE($sql);
              $sql = "DELETE   
                        FROM data WHERE cat_num = '$cat_num' ";
              $res = $this->db_DELETE($sql);
             if($res){header('location:'.$self.'?do=cat&action=del&res_cat_del=true');}
          }
         
 } 
?>
