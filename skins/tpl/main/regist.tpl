<!-- skins/tpl/main/pre_show.tpl begin -->  
 <?php  if (!empty($error_msg)){ echo $error_msg; }?>  
  <form action="?type=regist" method="post">
         <p><?php echo USER_LOGIN?></p> 
             <input type="text" name="login" /><br /><br />
              <input type="hidden" name="avatar" value="skins/images/no_photo.jpg" />
              <input type="hidden" name="status" value="user" /> 
         <p><?php echo USER_EMAIL?></p>
             <input type="text" name="email" /><br /><br />
         <p><?php echo USER_PASS?></p> 
             <input type="password" name="pass" /><br /><br />
         <p><?php echo USER_CONFIRM_PASS?></p>
             <input type="password" name="confirm_pass" /><br /><br />
        <input type="submit" value="<?php echo USER_MAKE_REGIST_LINK?>" />
    </form>
    
       
      
   
    
    
    
    
     
 <!-- skins/tpl/main/pre_show.tpl end -->
