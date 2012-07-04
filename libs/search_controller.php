<?php
 header("Content-Type: text/html;charset=utf-8");
 // подключаемся к базе
    include 'default.php';
 //получаем данные через $_POST
if (isset($_POST['data'])) {
    // никогда не доверяйте входящим данным! Фильтруйте всё!
    $word = mysql_real_escape_string($_POST['data']);
    $sql = "SELECT * FROM data WHERE title LIKE '%" . $word . "%' ORDER BY id LIMIT 10";
    // Получаем результаты
   $res = mysql_query($sql) or die(mysql_error());
     $arr_data = res2array($res);
    $c = count($arr_data);
    if (empty($arr_data)) echo "<br><br><p>По запиту `$word` нічого не знайдено</p> ";
    else        echo "<br><br> По запиту `$word` знайдено $c записів";
    include '../skins/tpl/main/preView.tpl';
}
 
?>
