<!-- skins/tpl/main/profile.tpl begin -->  
<table style=" margin-left: 100px;  width: 500px; border: 1px solid black; height:300px;font-weight: bold;"> 
    <tr>
    <td>
        <p>avatar</p>
    </td>
   <td> 
       <table style=" margin-left: 100px;  width: 500px; border: 1px solid black; height:300px;  ">
      <tr>
            <td>
                <p>Name :</p>
                 <?php echo $res["name"] ?>   
            </td>
     </tr>
        <tr>
            <td><p>Email :</p>
                <?php echo $res["email"] ?>
            </td>
        </tr>
        <tr>
            <td><p>Register date :</p>
                <?php echo $res["date_reg"] ?>
            </td>
        </tr>
        <tr>
            <td><p>Last update :</p>
                <?php echo $res["date_reg"] ?>
            </td>
        </tr>
        <tr>
          <td> 
      <form action="<?php echo $_SERVER['PHP_SELF']?>?type=profile" method="post">
          <input type="hidden" name="update_profile" /> 
          <input type="submit" value="update_profile" />
    </form>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="delete_profile" /> 
        <input type="submit" value="delete_profile" />
    </form>
          </td>
        </tr>
       </table>
     </td>
</tr>
 </table>
     <?php if (isset ($POST['update_profile'])){?>
     <form action=upload.php method=post enctype=multipart/form-data>
                <input type=file name=uploadfile>
                <input type=submit value=Загрузить>
     </form>
     
     
    <?php } ?>
 <!-- skins/tpl/main/profile.tpl end -->
