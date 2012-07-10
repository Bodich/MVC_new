<!-- skins/tpl/main/profile.tpl begin -->
  <?php if (isset($POST['update_profile'])){?>
    <form action="<?php echo $_SERVER['PHP_SELF']?>?type=profile" method = "post" enctype="multipart/form-data">
  <table style=" margin-left: 100px;  width: 200px; border: 1px solid black; height:300px;font-weight: bold;"> 
      <tr >
        <td >
            <img  src="<?php echo $res['avatar']?>" />
      
        <p>Change photo :</p>
              <input type=file name=uploadfile>
      </td>
   <td>  
    <table style="border: 0px solid black; height:300px;">
      <tr>
            <td>
                <p><?php echo USER_LOGIN?></p>
                <input class="round_shadow" name="name" value="<?php echo $res['name'] ?>" >  
            </td>
     </tr>
        <tr>
            <td>
           <p><?php echo USER_EMAIL?></p>
              <input class="round_shadow"   name="email"  value=" <?php echo $res['email']?>" /><br /><br /> 
            </td>
        </tr>
        <tr>
            <td>
           <p><?php echo USER_PASS?></p>
              <input class="round_shadow"   name="pass"  value=" <?php echo $res['pass']?>" /><br /><br /> 
              <input type="hidden" name="make_update" value="1" >
              <input type=submit value="<?php echo PROFILE_SAVE?>">
            </td>
        </tr>
                 
      </table>  
    </td>
  </tr>
  </table>      
   </form>      
    <?php }elseif(!isset($_GET['profile_id'])){  ?>
<table style=" margin-left: 100px;  width: 400px; border: 1px solid black; height:300px;font-weight: bold;"> 
    <tr>
    <td>
        <img src="<?php echo $res['avatar']?>" />
    </td>
   <td style="padding: 20px;"> 
       <table style=" width: 300px; border: 0px solid black;  height:300px; ">
      <tr>
          <td >
                <p><?php echo USER_LOGIN ?> :
                 <?php echo $res["name"] ?> </p>  
            </td>
     </tr>
        <tr>
            <td><?php echo USER_EMAIL?> :
                <?php echo $res["email"] ?></p>
            </td>
        </tr>
        <tr>
            <td><p><?php echo USER_STATUS?> :
                <?php echo $res["status"] ?></p>
            </td>
        </tr>
        <tr>
            <td><p> <?php echo USER_REGISTER_DATE?> :
                <?php echo date('Y-d-h',$res["date_reg"]); ?></p>
            </td>
        </tr>
        <tr>
            <td><p> <?php echo USER_LAST_ENTER?> :
                <?php echo date('d-m-Y:h-m-s',$res["date_last_log"]); ?></p>
            </td>
        </tr>
        <tr>
          <td> 
              <?php  if ($res['status'] != 'blocked') {    ?>
    
   
      <form action="<?php echo $_SERVER['PHP_SELF']?>?type=profile" method="post">
          <input type="hidden" name="update_profile" /> 
          <input type="submit" value="<?php echo PROFILE_UPDATE_LINK?>" /> 
    </form><br /><form action="<?php echo $_SERVER['PHP_SELF']?>?type=profile" method="post">
        <input type="hidden" name="make_dell" value="1"  /> 
          <input type="submit" value="<?php echo PROFILE_DELL_LINK?>" /> 
    </form><br />
      <?php }else echo 'you are blocked' ?>         
    
   <?php  if ($res['change_status']) {    ?>
   <ul>
           <li><a href="<?php echo $_SERVER['PHP_SELF']?>?type=user_update"><?php echo USER_SHOW_LINK?></a></li>
           <li><a href="?do=art&action=add"><?php echo ART_ADD_LINK?></a></li>
           <li><a href="?do=art&action=update"><?php echo ART_REDACT_LINK?></a> </li>
           <li><a href="?do=art&action=del"><?php echo ART_DELL_LINK?></a> </li>
    </ul>
   <?php } ?>
    <?php  if ($res['update_articles'] && $res['status'] != 'admin') {    ?>
      <li><a href="?do=art&action=add"><?php echo ART_ADD_LINK?></a></li>
      <li><a href="?do=art&action=update"><?php echo ART_REDACT_LINK?></a> </li>
      <li><a href="?do=art&action=del"><?php echo ART_DELL_LINK?></a> </li>
   <?php } ?>
    
          </td>
        </tr>
       </table>
     </td>
</tr>
 </table>
     <?php  }else {?>
        <table style=" margin-left: 100px;  width: 400px; border: 1px solid black; height:300px;font-weight: bold;"> 
    <tr>
    <td>
        <img src="<?php echo $res['avatar']?>" />
    </td>
   <td style="padding: 20px;"> 
       <table style=" width: 300px; border: 0px solid black;  height:300px; ">
      <tr>
          <td >
                <p><?php echo USER_LOGIN ?> :
                 <?php echo $res["name"] ?> </p>  
            </td>
     </tr>
         
        <tr>
            <td><p><?php echo USER_STATUS?> :
                <?php echo $res["status"] ?></p>
            </td>
        </tr>
        <tr>
            <td><p> <?php echo USER_REGISTER_DATE?> :
                <?php echo date('Y-d-h',$res["date_reg"]); ?></p>
            </td>
        </tr>
        <tr>
            <td><p> <?php echo USER_LAST_ENTER?> :
                <?php echo date('d-m-Y:h-m-s',$res["date_last_log"]); ?></p>
            </td>
        </tr>
         
       </table>
     </td>
</tr>
 </table>
     <?php } ?>
 <!-- skins/tpl/main/profile.tpl end -->
