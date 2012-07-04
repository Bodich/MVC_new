<script>
    doit="<? echo $GET['do']; ?>";  
    action = "<? echo $GET['action']; ?>";
 </script>
<?php
 
     if (isset($POST['title'])){
      echo 'sdsdsds';
     $art_controller->art_add($POST);

    }
?>
 