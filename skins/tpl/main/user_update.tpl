   <?php if(!isset($POST['user_update']) && !isset($POST['user_delete'])){ ?>
<table border="1" style=" width: 500px;">
    <tr> <th>id</th><th>name</th><th>status</th><th>action</th></tr> 
 <?php foreach ($users_array as $item){?>
     <tr>
    <td><?php echo $item['id']?></td>   
    <td><?php echo $item['name']?></td> 
     <td><?php echo $item['status']?></td> 
     <td>
         <form action="<?php echo $_SERVER['PHP_SELF']?>?type=user_update" method="post">
             <input type="hidden" name="id" value="<?php echo $item['id']?>" /> 
             <input type="hidden" name="user_update" /> 
          <input type="submit" value="REDACT" /> <br /><br />
          </form>
       <form action="<?php echo $_SERVER['PHP_SELF']?>?type=user_update" method="post">
          <input type="hidden" name="id" value="<?php echo $item['id']?>"/> 
          <input type="hidden" name="make_dell" value="1" /> 
          <input type="submit" value="DELETE" /> <br /><br />
     </form>
     </td> 
     <tr>
<?php } ?>
    
</td></tr>  
</table>
 <?php } if(isset($POST['user_update'])){ ?>
 <form action="<?php echo $_SERVER['PHP_SELF']?>?type=user_update" method = "post" enctype="multipart/form-data">
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
                <p>User name :</p>
                <input class="round_shadow" name="name" value="<?php echo $res['name'] ?>" >  
            </td>
     </tr>
        <tr>
            <td>
           <p>User mail :</p>
              <input class="round_shadow"   name="email"  value=" <?php echo $res['email']?>" /><br /><br /> 
            </td>
        </tr>
        <tr>
            <td>
           <p>User password :</p>
              <input class="round_shadow"   name="pass"  value=" <?php echo $res['pass']?>" /><br /><br /> 
              <p>User status :</p>
              
             <select size="1"   name="status">
                    <option disabled>Выберите статус</option>
                   <?php foreach ($res_p as $item){
                   if ($res['status'] == $item['status'] ){ ?>
                  <option selected value="<?php echo $item['status']?>"><?php echo $item['status']?></option>
                      <?php }else {?> 
                        <option value="<?php echo $item['status']?>"><?php echo $item['status']?></option>
             <?php }}?>
             </select><br /><br />
              <input type="hidden" name="id" value="<?php echo $res['id']?>" /> 
              <input type="hidden" name="make_update" value="1" >
              <input type=submit value="Save changes">
            </td>
        </tr>
                 
      </table>  
    </td>
  </tr>
  </table>      
   </form>      

<?php } ?>
  