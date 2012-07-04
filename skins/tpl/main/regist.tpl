<!-- skins/tpl/main/pre_show.tpl begin -->  
 <?php  if (!empty($error_msg)){ echo $error_msg; }?>  
  <form action="?type=regist" method="post">
         <p>login:</p> 
             <input type="text" name="login" /><br /><br />
         <p>email:</p>
             <input type="text" name="email" /><br /><br />
         <p>Password:</p> 
             <input type="password" name="pass" /><br /><br />
         <p>Confirm password:</p>
             <input type="password" name="confirm_pass" /><br /><br />
        <input type="submit" value="SUBMIT" />
    </form>
    
       
      
   
    
    
    
    
     
 <!-- skins/tpl/main/pre_show.tpl end -->
