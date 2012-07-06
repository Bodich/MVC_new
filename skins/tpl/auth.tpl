    <?php  if(!isset($_SESSION['user'])){ ?>
    <table><tr>
            <td>
                <p>Авторизация пользователя:</p><br />
            </td>
        </tr>
        <tr><td>
     <form action="?type=preView" method="post">
         <p>Логин:</p><br />
             <input type="text" name="login_a" />
         <label>Пароль:</label><br />
             <input type="password" name="pass" /><br />
        <input type="submit" value="log in" />
    </form>
    <form action="?type=regist" method="post">
               <input type="submit" value="registration" />
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
         <input type="submit" value="      EXIT      " />
     </form>
    
    <?php  }?>
    
 