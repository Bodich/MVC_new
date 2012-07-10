<?php
 $art_controller = new art_controller(); 
 $user_auth_controller = new user_auth_controller(); 
 $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'vertrigo');
 
 //$insert = $bd->exec('INSERT INTO `table` (`имя столбца`) VALUES("значение")');
 // $update = $bd->exec('UPDATE `table` SET `имя столбца`="значение"'); 
 //$sel = $bd->query('SELECT * FROM `table`;'); // значение FALSE в случае ошибки
 //$res = $bd->query('SELECT * FROM `table`;');
 //while ($row = $res->fetch(PDO::(FETCH_BOTH или FETCH_ASSOC или FETCH_NUM или FETCH_OBJ или FETCH_LAZY))) {
//...     цикл...
 //
 //}
 //$res = $db->query(“SELECT * FROM users”, PDO::FETCH_ASSOC);
//foreach ($res as $row) {
// $row - ассоциативный массив значений
//}
 function res2array($data){
            while($row = mysql_fetch_assoc($data)){
                $arr[] = $row;
            }
            return $arr;  
}
 
#Определил константы для подключения к серверу
 function connect() {
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "vertrigo");
    define("DB", "test");
     #Соединение с сервером, выбор БД 
    $db = mysql_connect(HOST, USER, PASSWORD) or die(mysql_error());
    $selectDB = mysql_select_db(DB) or die(mysql_error());
        mysql_query("SET NAMES utf8");
        mysql_query("SET CHARACTER SET utf8_general_ci'");
        /* mysql_query('SET COLLATION_CONNECTION="cp1251_general_ci"',$db);   */
}
 connect();
 
  
function formatDate($date, $format = true) {
    global $month;

    $day = substr($date, 8, 2);
    $mnt = $month[substr($date, 5, 2)];
    $year = substr($date, 0, 4);
    $time = '';

    if ($format)
        $time = ' ' . substr($date, 11);

    return $day . ' ' . $mnt . ' ' . $year . $time;
}

function __autoload($classname){
            include 'libs/'.$classname . '.class.php';
        }
        
        function drawTableH($data, $columns=10, $tabs=0)
{
    
    $tbl = null;

    if($tabs === false)
    {
        $tr = $td = null;
    }
    else
    {
        $tr = "\n".str_repeat("\t", $tabs);
        $td = $tr."\t";
    }

    for($i = 0, $n = 1, $d = ceil(count($data) / $columns) * $columns; $i < $d; $i++, $n++)
    {
        if($n == 1)
            $tbl .= $tr.'<tr>'; 

        $tbl .= $td.'<td  style="padding: 25px;">'.(isset($data[$i]["title"]) ? 
                '<input  type="checkbox" name="id" value="'.$data[$i]["id"].'" >  &nbsp'. $data[$i]["title"] : '&nbsp;').'</td>';

        if($n == $columns)
        {
            $n = 0;
            $tbl .= $tr.'</tr>';
        }
    }

    if($tabs !== false)
        $tbl .= "\n";

    return $tbl;
}

function art_drawTableH($data, $columns=10, $tabs=0)
{
    
    $tbl = null;

    if($tabs === false)
    {
        $tr = $td = null;
    }
    else
    {
        $tr = "\n".str_repeat("\t", $tabs);
        $td = $tr."\t";
    }

    for($i = 0, $n = 1, $d = ceil(count($data) / $columns) * $columns; $i < $d; $i++, $n++)
    {
        if($n == 1)
            $tbl .= $tr.'<tr>'; 

        $tbl .= $td.'<td  style="padding: 25px;">'.(isset($data[$i]["title"]) ? 
                '<input  type="checkbox" name="id" value="'.$data[$i]["id"].'" >  &nbsp'. $data[$i]["title"].'<br>('.$data[$i]["title"].')' : '&nbsp;').'</td>';

        if($n == $columns)
        {
            $n = 0;
            $tbl .= $tr.'</tr>';
        }
    }

    if($tabs !== false)
        $tbl .= "\n";

    return $tbl;
}