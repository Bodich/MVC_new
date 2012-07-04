<?php
    $sql = "SELECT 
                     title,
                     main_text
                           FROM tmp_table";
 
 $res = mysql_query($sql) or die (mysql_error());
    $sql = "SELECT 
                id,
                title,
                main_text  
                    FROM tmp_table WHERE id = ".$GET['id']."";

 $mainView = mysql_fetch_assoc($res);
  
    
    
    
   
    

