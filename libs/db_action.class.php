<?php

interface db {
        function db_SELECT($sql);

        function db_UPDATE($sql);

        function db_DELETE($sql);
}
   class db_action  implements db {

    public $res;
    public $query;
    protected $tmp = array();

   
     function db_SELECT($sql) {
        $res = mysql_query($sql)or die(mysql_error('sss')); 
        if(!$res) echo'Помилка вибору по запиту '.$sql;
        $res = $this->res2array($res); 
         return $res;
    }

    function db_UPDATE($sql) {
        $res = mysql_query($sql)or die(mysql_error()); 
        if(!$res) echo'Помилка редагування по запиту '.$sql;else echo '';
        
         
        return $res;
    }

    function db_DELETE($sql) {
        $res = mysql_query($sql)or die(mysql_error()); 
        if(!$res) echo'Помилка видалення по запиту '.$sql;
        mysql_free_result($sql);
        return $res;
    }

    function res2array($data){
        if (mysql_num_rows($data)>0)
            while($row = mysql_fetch_assoc($data)){
            $arr[] = $row;
        }
        else $arr = '<p>результатов по запросу нет!';  
        
    return $arr;  
    }
     function clearData($data,$type='s'){
        switch ($type){
            case 's' :
                return trim(strip_tags($data)); 
            case  'i': 
            return int($data); 
     }
 }

}
?>
