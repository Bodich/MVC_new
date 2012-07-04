<?php

/**  
* Контроллер формирования случайного обращения 
* The controller of formation of the casual reference 
 */ 
    
    if (isset($GET["do"])){
     include './modules/main/'.$GET['do'].'_'.$GET['action'].'_controller.php'; 
	}
     elseif (isset($GET["type"])){
         
         include './modules/main/'.$GET["type"].'_controller.php';
         
         }
/**  
* Подготовка к выводу 
* Preparation for a conclusion 
*/ 
    include './modules/main/view.php';



