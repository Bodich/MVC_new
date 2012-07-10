<?php
 class art_controller extends db_action{
     public $art_choose_del_array = array();
     public $art_redact_array  = array();
     public $art_choose_redact_array = array();
      
      function art_add($POST){
                extract($POST);
                    $sql = "INSERT INTO tmp_table (
                                        title,
                                        main_text,
                                        title_en,
                                        main_text_en
                                                ) VALUES (
                                                    '$title',
                                                    '$main_text',
                                                    '$title_en',
                                                    '$main_text_en'
                                                    )";

                $res = mysql_query($sql)  or die (mysql_error('sss'));  
                if($res){echo ART_ADD_OK ;}
                else echo 'Пмилка запису статті в базу';
            }
        
     
   function art_select_to_update(){ 
            $data = array();
            $sql = 'SELECT  id,
                            title,
                            main_text
                                FROM `tmp_table` ';
                $res = $this->db_SELECT($sql);
                $this->art_choose_redact_array = $res;
                
    }
    
    function art_redact_to_update($POST){ 
                $id = $POST["id"];
                $sql = "SELECT  id,
                            title,
                            main_text
                            FROM `tmp_table` WHERE  id ='$id' ";
                $res = $this->db_SELECT($sql);
                $this->art_redact_array = $res; 
        }
            
       function art_make_update($POST){
            extract($POST);
               $sql = "UPDATE tmp_table 
                            SET 
                             title='$title',
                             main_text='$main_text' 
                                        WHERE id='$id'";

            $res = $this->db_UPDATE($sql);
            if($res){echo 'update - ok'; 
            header('location:?do=art&action=update&res_art_add=true');
            }

            else echo 'Пмилка редагування статті ';
    }
   
     function art_choose_to_del(){
             $sql = 'SELECT  
                           `id`,
                           `title`
                                FROM `tmp_table` ORDER BY `id` DESC';
            
            $res = $this->db_SELECT($sql);
            $this->art_choose_del_array = $res;
        }
         function art_make_del($id){
              $sql = "DELETE   
                        FROM tmp_table WHERE id = '$id' ";
             $res = $this->db_DELETE($sql);
             if($res){header('location:'.$self.'?do=art&action=del&res_art_del=true');}
         }
         
 } 
 
