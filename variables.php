<?php

/**  
 * Получаем GET переменную   
 * Receive GET a variable  
 */
$id       = !empty($_GET['id']) ? $_GET['id'] : NULL;
$page     = !empty($_GET['page']) ? $_GET['page'] : NULL;
$type     = isset($_GET['type']) ? $_GET['type'] : 'preView';
  

$GET['type']   = isset($_GET['type']) ? $_GET['type'] : 'preView';
 $GET['do']     = isset($_GET['do']) ? $_GET['do'] : NULL;
$GET['id']     = !empty($_GET['id']) ? $_GET['id'] : NULL;
$GET['action'] = isset($_GET['action']) ? $_GET['action'] : NULL;
$POST['login'] = isset($_POST['login']) ? $_POST['login'] : NULL;
$POST['pass']  = isset($_POST['pass']) ? $_POST['pass'] : NULL;
$POST['exit']  = isset($_POST['exit']) ? $_POST['exit'] : NULL;
$POST['regist']  = isset($_POST['regist']) ? $_POST['regist'] : NULL; 
$POST['email']  = isset($_POST['email']) ? $_POST['email'] : NULL;
$POST['confirm_pass']  = isset($_POST['confirm_pass']) ? $_POST['confirm_pass'] : NULL;
$POST['update_profile']  = isset($_POST['update_profile']) ? $_POST['update_profile'] : NULL;
$POST['delete_profile']  = isset($_POST['email']) ? $_POST['delete_profile'] : NULL;


$POST['id'] = !empty($_POST['id']) ? $_POST['id'] : NULL;
$POST['main_text'] = !empty($_POST['main_text']) ? $_POST['main_text'] : NULL;

$POST['title'] = !empty($_POST['title']) ? $_POST['title'] : NULL;
 
 