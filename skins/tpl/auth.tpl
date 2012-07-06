    <?php  if(!isset($_SESSION['user'])){ ?>
    <table><tr>
            <td>
                <p><?php echo USER_REGIST_LINK?></p><br />
            </td>
        </tr>
        <tr><td>
     <form action="?type=preView" method="post">
             <p><?php echo USER_LOGIN?></p><br />
             <input type="text" name="login_a" />
         <label><?php echo USER_PASS?></label><br />
             <input type="password" name="pass" /><br />
        <input type="submit" value="<?php echo USER_ENTER?>" />
    </form>
    <form action="?type=regist" method="post">
               <input type="submit" value="<?php echo USER_REGIST_LINK?>" />
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
         <input type="submit" value="<?php echo USER_REGIST_LINK?>" />
     </form>
    
    <?php  }?>
    
 