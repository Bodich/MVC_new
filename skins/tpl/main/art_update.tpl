 
<?php if(!isset($POST['id'])){ ?>
<form action="?do=art&action=update" method="POST">
    <table  border="1"> 
   <?php echo art_drawTableH($res, 7, 0) ?>
   <input  type="hidden" name="art_update" value="1" >
  </table><br> 
  <input class='btn btn-success' type="submit" value="<?php echo ART_REDACT_LINK?>"/> 
</form>
<?php   } else {echo $POST['id'];?>

<form id=""  action="?do=art&action=update" method="POST">
    <input type="hidden" name="id" value="<?php echo $res[0]['id']?>"
     <p><?php echo  ART_NAME?></p>
 <textarea class="round_shadow"  cols="70" rows="5"  name="title" ><?php echo $res[0]['title']?></textarea><br>
    
      <textarea class="round_shadow"  cols="70" rows="5"   name="main_text" ><?php echo $res[0]['main_text']?></textarea><br><br>
   <button class='btn btn-success' type="submit"><?php echo ART_REDACT_LINK?></button>
</form>   

<?php if ($_SESSION['status'] == 'admin'){?>
     <form action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" method="post">
        <input type="hidden" name="rait_dell" value="<?php echo $res[0]['id']?>">
       <INPUT type="submit" value="Видалити рейтинг" >  
     </form>
<?php } } ?>


 
 
