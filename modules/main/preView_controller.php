<?php
  
$sql = "SELECT 
                 id,
                 $field_t,
                 $field_m_text  
                     FROM tmp_table ";
 $arr_data = $db->query($sql, PDO::FETCH_ASSOC);
 //print_r($arr_data);
 