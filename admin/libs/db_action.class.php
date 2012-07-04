<?php

interface db {
        function db_SELECT($sql);

        function db_UPDATE($sql);

        function db_DELETE($sql);
}

class db_connect   {
    const HOST = "http://127.0.0.1";
    const USER = "Bodich";
    const PASSWORD = "vertrigo";
    const DB = "test";
    public $link;
    const NO_CONNECT = 'НЕ МОГУ ПОДКЛЮЧИТСЯ К БАЗЕ';
    const NO_DATA_BASE = 'НЕ МОГУ НАЙТИ ТЕКУЩУЮ БАЗУ ДАННЫХ';
    
    function connect(){
        $this->link = mysql_connect(self::HOST,self::USER,self::PASSWORD) or die(mysql_error(self::NO_CONNECT));        
            mysql_select_db(self::DB) or die(mysql_error(self::NO_DATA_BASE));
            mysql_query("SET NAMES utf8");
            mysql_query("SET CHARACTER SET utf8_general_ci'");
            mysql_query('SET COLLATION_CONNECTION="cp1251_general_ci"',$this->link);   
 
        }
 }

 class db_action extends db_connect implements db {

    public $res;
    public $query;
    protected $tmp = array();

    function __construct() {
        $this->connect();
 }
     function db_SELECT($sql) {
        $res = mysql_query($sql,$this->link)or die(mysql_error('sss')); 
        if(!$res) echo'Помилка вибору по запиту '.$sql;
        $res = $this->res2array($res); 
         return $res;
    }

    function db_UPDATE($sql) {
        $res = mysql_query($sql,$this->link)or die(mysql_error()); 
        if(!$res) echo'Помилка редагування по запиту '.$sql;else echo '';
        
         
        return $res;
    }

    function db_DELETE($sql) {
        $res = mysql_query($sql,$this->link)or die(mysql_error()); 
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
