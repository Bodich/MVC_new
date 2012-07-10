    <?php  if(!isset($_SESSION['user'])){ ?>
    <table>
        <tr>
            <td>
                <p><?php echo USER_REGIST_LINK?></p> 
            </td>
        </tr>
        <tr>
            <td>
     <form action="?type=preView" method="post">
             <p><?php echo USER_LOGIN?></p> 
             <p><input type="text" name="login_a" /></p>
             <p><label><?php echo USER_PASS?></label></p>
             <p><input type="password" name="pass" /></p> 
             <p><input type="submit" value="<?php echo USER_ENTER?>" /></p>
    </form>
    <form action="?type=regist" method="post">
               <p><input type="submit" value="<?php echo USER_REGIST_LINK?>" /></p>
    </form>
             
            <td>
        </tr>
        </table>
    <?php if (isset($error)){ echo $error; }
    }else{
    echo $hello_admin;
    ?>
    <br /><br /> 
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
         <input type="hidden" name="exit"/>
         <input type="submit" value="<?php echo PROFILE_EXIT_LINK?>" />
     </form>
    
    <?php  }?>
    
 