<?php

if (!defined('IRB_KEY')) {
    header("HTTP/1.1 404 Not Found");
    exit(file_get_contents('./404.html'));
}

function stripslashesDeep($data) {
    if (is_array($data))
        $data = array_map("stripslashesDeep", $data);
    else
        $data = stripslashes($data);
    return $data;
}

if (get_magic_quotes_gpc()) {
    $_GET = stripslashesDeep($_GET);
    $_POST = stripslashesDeep($_POST);
    $_COOKIE = stripslashesDeep($_COOKIE);
}




/**
 * Получаем GET переменную   
 * Receive GET a variable  
 */
//$GET['id'] = !empty($_GET['id']) ? $_GET['id'] : NULL;
$GET['page'] = !empty($_GET['page']) ? $_GET['page'] : NULL;
$GET['do'] = !empty($_GET['do']) ? $_GET['do'] : 'art';
$GET['action'] = !empty($_GET['action']) ? $_GET['action'] : 'add';

$POST['id'] = !empty($_POST['id']) ? $_POST['id'] : NULL;
$POST['cat_num'] = !empty($_POST['cat_num']) ? $_POST['cat_num'] : NULL;
$POST['cat_title'] = !empty($_POST['cat_title']) ? $_POST['cat_title'] : NULL;
$POST['cat_keys'] = !empty($_POST['cat_keys']) ? $_POST['cat_keys'] : NULL;
$POST['cat_des'] = !empty($_POST['cat_des']) ? $_POST['cat_des'] : NULL;
$POST['main_text'] = !empty($_POST['main_text']) ? $_POST['main_text'] : NULL;

$POST['title'] = !empty($_POST['title']) ? $_POST['title'] : NULL;
$POST['pre_text'] = !empty($_POST['pre_text']) ? $_POST['pre_text'] : NULL;
$POST['art_keys'] = !empty($_POST['art_keys']) ? $_POST['art_keys'] : NULL;
$POST['art_des'] = !empty($_POST['art_des']) ? $_POST['art_des'] : NULL;






//$t = file_get_contents('http://www.sberbank-ast.ru/purchaseList.aspx');
//echo $t;