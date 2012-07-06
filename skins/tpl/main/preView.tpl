<!-- skins/tpl/main/pre_show.tpl begin -->  
   <?php foreach($arr_data as $item){?>
   <table border="1" style="width: 400px; height: 200px; margin:20px;"> 
                   <tr>
                       <td>
                           <p> name article </p>
                         <p> <b> <?php echo $item['title'];?></b></p>
                       </td>
                   </tr>
                   <tr>
                       <td>
                           <p> text article </p>
                          <?php echo $item['main_text']?>
                          <a href='?type=mainView&id=<?php echo $item["id"]?>'> <?php echo  ART_READ_ALL_LINK?></a>
                       </td>
                   </tr>
                </table> 
               <?php }?>
 <!-- skins/tpl/main/pre_show.tpl end -->
