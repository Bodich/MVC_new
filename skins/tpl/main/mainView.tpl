 <table border="1"  style="width: 400px; height: 300px;" > 
  <?php if(empty($r[2])){?>   
     <p><?php echo AMOUNT_VOTES?> :</p>
     <?php echo $r[0]?>
     <p><?php echo ART_RAIT?> :</p>
      <?php for($i=0;$i<$r[1];$i++){?>
     <img src="skins/images/star.png">
    <?php }}else echo $r[2];?>
     
    <tr>
            <td>
                <b><?php echo $mainView[$field_t];?></b>
            </td>
        </tr>
        <tr>
            <td>
                 
                <?php echo $mainView[$field_m_text];?>
            </td>
        </tr>
</table>
<br />
<?php if(!$is_voted && $_SESSION['user_id']>0){?>
<p><?php echo ART_ESTIMATION?> : </p>
<form action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" method="post">
        <table border="0" >
            <tr> 
        <td style="padding: 10px;">
            1
            <INPUT type="radio" name="vote" value="1"> 
        </td>
        <td style="padding: 10px;">
            2
            <INPUT type="radio" name="vote" value="2">
        </td>
        <td style="padding: 10px;">
            3
            <INPUT type="radio" name="vote" value="3">
        </td>
        <td style="padding: 10px;">
            4
            <INPUT type="radio" name="vote" value="4">
        </td>
        <td style="padding: 10px;">
            5
            <INPUT type="radio" name="vote" value="5" >
        </td>
        <td style="padding: 10px;">
            <INPUT type="submit" value="<?php echo TO_VOTE?> : " >
        </td>
         
         </tr> 
        </table>
   </form> 
<?php } 
   if(isset($msg)){ 
         echo $msg.'<br />';  
   }  if($is_voted && $_SESSION['user_id']>0){?>
    <p><?php echo ART_ESTIMATION?> :<?php echo $is_voted['user_estimation'];?> </p>
     <form action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" method="post">
         <input type="hidden" name="vote_dell" value="1">
       <INPUT type="submit" value="<?php echo DELL_ESTIMATION?>" >  
     </form>
<?php } if($_SESSION['user_id']>0){ ?>
 <p><?php echo ADD_COMMENT?> :</p>
     <form action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" method="post">
         <p><?php echo COM_SUBJECT?> :</p>
         <input type="text" name="com_title" size="70" /><br />
         <p><?php echo COM_TEXT?> :</p>
         <textarea name="com_text" cols="70" rows="7"> </textarea><br />
       <INPUT type="submit" value="<?php echo ADD_COMMENT?>" >  
     </form>
<?php } ?>
<p><?php echo COM_TEXT?> :</p>
 <?php foreach($com_data as $item){?>
   <table border="1" style="width: 500px; margin: 10px;" >
      <tr>
          <td style="width: 200px; ">
           <?php  
           $sql = "SELECT 
                          id,
                            name,
                          avatar,
                          status 
                              FROM users WHERE id = ".$item['user_id']."";
                              
              $column = $db->query($sql);
              $user = $column->fetch(PDO::FETCH_ASSOC);
               ?>
            <p><?php echo AUTOR?> :</p>
            <a href="<?php echo $_SERVER['PHP_SELF']?>?type=profile&profile_id=<?php echo $user['id'];?>"><?php echo $user['name'];?></a><br />
            <p><?php echo USER_STATUS?> :</p>
            <?php echo $user['status'];?><br />
            <img src="<?php echo $user['avatar'];?>"/>
            <p><?php echo DATE_PUBLICK?> :</p>
            <?php echo date('m-d-Y',$item['date']);?><br />
          </td>
          <td style="vertical-align: top;">
             <p><?php echo COM_SUBJECT?> :</p>
              <?php echo $item['title_coment'];?><br />
              <p><?php echo COM_TEXT?> :</p>
              <?php echo $item['text_coment'];?><br />
           <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'admin'){?> 
         <form action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" method="post">
            <input type="hidden" name="comm_dell" value="<?php echo $item['id'];?>">
            <INPUT type="submit" value="<?php echo DELL_COMMENT_LINK?>" >  
         </form>
           <?php } ?>
          </td>
      </tr>
      
  </table>
  <?php }?>