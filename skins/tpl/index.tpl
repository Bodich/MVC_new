 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
     <head>
        <link href="skins/css/body.css" rel="stylesheet" type="text/css" />
        <link href="skins/css/navig_left_menu/left_menu.css" rel="stylesheet" type="text/css" />
        <link href="skins/css/right_td.css" rel="stylesheet" type="text/css" />
        <link href="skins/css/preView/button.css" rel="stylesheet" type="text/css" />
        <link href="skins/css/search/search.css" rel="stylesheet" type="text/css" />
        <title>ТЕСТОВАЯ СТРАНИЦА</title>
     </head>
   <body>
        <div id="contaner">
            <div id="header">
                
            </div>
            <div id="content">
                <table>
                    <tbody>
                        <tr>
                            <td id="left_menu_td">
                                <?php
                                include './skins/tpl/menu.tpl';
                                ?>
                            </td>
                            <td id="my_content">
                                <?php  echo $content ;?>
                            </td>
                            <td id="right_td">
                                
                                <a href="?<?php echo $_SERVER['QUERY_STRING']?>&ln=en"><img src="language/en.png"></a> 
                                <a href="?<?php echo $_SERVER['QUERY_STRING']?>&ln=ua"><img src="language/ua.png"></a>
                                <?php
                                include './skins/tpl/auth.tpl';
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="clear: both"> </div>
            <div id="empty"></div>

        </div>
        <div id="footer"><hr/> </div>
    </body>
</html>