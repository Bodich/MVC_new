<?php
    

$sql = "SELECT 
                 id,
                 title,
                 main_text  
                     FROM tmp_table ";
 
 $res = mysql_query($sql) or die (mysql_error());
 $arr_data = res2array($res);
 