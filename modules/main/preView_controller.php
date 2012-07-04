<?php
    function res2array($data){
            while($row = mysql_fetch_assoc($data)){
                $arr[] = $row;
            }
            return $arr;  
}

$sql = "SELECT 
                 id,
                 title,
                 main_text  
                     FROM tmp_table ";
 
 $res = mysql_query($sql) or die (mysql_error());
 $arr_data = res2array($res);
 