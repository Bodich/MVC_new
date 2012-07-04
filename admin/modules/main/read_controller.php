<?php

/**
* Выбор случайного значения из массива 
* Choice of casual value from a file
*/
    $arr_who = array( 
                       1 => IRB_WHO_FIRST, 
                            IRB_WHO_SECOND, 
                            IRB_WHO_THIRD, 
                            IRB_WHO_FOURTH, 
                            IRB_WHO_FIFTH 
                     ); 
            
    $who = $arr_who[rand(1,5)];



