<?php
$db_action = new db_action();
$cat_controller = new cat_controller(); 
$art_controller = new art_controller(); 


$self = $_SERVER['PHP_SELF'];  

    function formatDate($date, $format = true) 
    { 
        global $month;

        $day  = substr($date, 8, 2);         
        $mnt  = $month[substr($date, 5, 2)];        
        $year = substr($date, 0, 4); 
        $time = '';
		
        if($format)         
            $time = ' '. substr($date, 11); 

        return $day .' '. $mnt .' '. $year . $time; 
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

        $tbl .= $td.'<td  style="padding: 25px;">'.(isset($data[$i]["cat_title"]) ? 
                '<input  type="checkbox" name="id" value="'.$data[$i]["id"].'" >  &nbsp'. $data[$i]["cat_title"] : '&nbsp;').'</td>';

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
                '<input  type="checkbox" name="id" value="'.$data[$i]["id"].'" >  &nbsp'. $data[$i]["title"].'<br>('.$data[$i]["cat_title"].')' : '&nbsp;').'</td>';

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

function res2array($data) {

    while ($row = mysql_fetch_assoc($data)) {
        $arr[] = $row;
    }
    return $arr;
}