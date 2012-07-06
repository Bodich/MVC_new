 <?php
   session_start(); 
  if (!isset($_SESSION['ln'])) $_SESSION['ln'] = 'ua'; 
  if (isset($_GET['ln'])){$_SESSION['ln'] = $_GET['ln'];}
    header("Content-Type: text/html; charset=utf-8"); 
    error_reporting(E_ALL); 
  	 echo $_SERVER['QUERY_STRING'];
/**
* Получаем файл переменных 
* Receive a variables file 
*/
    include './variables.php';
	
/**
* We connect a file of the general functions
* Подключаем файл общих функций
*/ 
     include './libs/default.php';
     include './language/'.$_SESSION['ln'].'.php';
/**
* We put in order a conclusion
* Приводим в порядок вывод
*/ 
      include './libs/view.php';
      include './libs/auth_controller.php';
	
    ob_start();  

/**  
* Подключаем меню  
* Includes the menu  
*/  
    // include './skins/tpl/menu.tpl';  

/**
* The switch of modules
* Переключатель страниц
*/      
    switch($page) 
    { 
/**  
* Подключаем модуль приветствия  
* Includes the greeting module  
*/         
        case 'main':    
            include './modules/main/router.php';            
        break; 
/**  
* Подключаем модуль второй страницы  
* Includes the module of the second page  
*/ 
        case 'second':
            include './modules/second/router.php'; 
        break; 
/**  
* Подключаем модуль приветствия по умолчанию 
* Includes the greeting module  
*/           
        default:
            include './modules/main/router.php';
        break;    
    }  

    $content = ob_get_contents();  
    ob_end_clean();  
/**  
* Подключаем главный шаблон  
* Includes the basic template  
*/  
    include './skins/tpl/index.tpl';

