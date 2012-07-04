<?php

/**
 * Получаем GET переменную   
 * Receive GET a variable  
 */
$id       = !empty($_GET['id']) ? $_GET['id'] : NULL;
$page     = !empty($_GET['page']) ? $_GET['page'] : NULL;
$type     = isset($_GET['type']) ? $_GET['type'] : 'preView';
  

$GET['type']   = isset($_GET['type']) ? $_GET['type'] : NULL;
$GET['do']     = isset($_GET['do']) ? $_GET['do'] : NULL;
$GET['id']     = !empty($_GET['id']) ? $_GET['id'] : NULL;
$GET['action'] = isset($_GET['action']) ? $_GET['action'] : NULL;
$POST['login'] = isset($_POST['login']) ? $_POST['login'] : NULL;
$POST['pass']  = isset($_POST['pass']) ? $_POST['pass'] : NULL;
$POST['exit']  = isset($_POST['exit']) ? $_POST['exit'] : NULL;
 

$POST['id'] = !empty($_POST['id']) ? $_POST['id'] : NULL;
$POST['main_text'] = !empty($_POST['main_text']) ? $_POST['main_text'] : NULL;

$POST['title'] = !empty($_POST['title']) ? $_POST['title'] : NULL;
 
 