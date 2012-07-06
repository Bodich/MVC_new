<script>
    doit="<? echo $GET['do']; ?>";  
    action = "<? echo $GET['action']; ?>";
 </script>
<?php
 if(isset($_GET['res_art_del']))echo ART_DELL_OK;
 if($_SESSION['status'] == 'redactor' or $_SESSION['status'] == 'admin')
   {
    if(!isset($POST['id']))
    {
            $art_controller->art_choose_to_del();
            $res = $art_controller->art_choose_del_array;
    }
    else    $art_controller->art_make_del($POST['id']);
     }