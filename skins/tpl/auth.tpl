    <?php  if(!isset($_SESSION['user'])){ ?>
    <table><tr>
            <td>
                <p>Авторизация пользователя:</p><br />
            </td>
        </tr>
        <tr><td>
     <form action="?type=preView" method="post">
         <p>Логин:</p><br />
             <input type="text" name="login" />
         <label>Пароль:</label><br />
             <input type="password" name="pass" />
        <input type="submit" value="авторизироватся" />
    </form>
             <td>
        </tr>
        </table>
    <?php if (isset($error)){ echo $error; }
    }else{
    echo $hello_admin;
    ?>
    <br /><br /> 
     <form action="?type=preView" method="post">
         <input type="hidden" name="exit"/>
         <input type="submit" value="      EXIT      " />
     </form>
    
    <?php  }?>
    
 