<?php

/**  
* Подключаем шаблон  
* Includes a templates  
*/
if (isset($GET["do"])){
      include './skins/tpl/main/'.$GET["do"].'_'.$GET["action"].'.tpl';
	}
      else  include './skins/tpl/main/'.$_GET["type"].'.tpl';
	
    



