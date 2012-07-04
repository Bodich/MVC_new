<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <script language="javascript" type="text/javascript" src="skins/js/jquery.js"> </script>
        <script language="javascript" type="text/javascript" src="skins/js/navig_left_menu.js"></script>
        <script type="text/javascript" src="libs/ckeditor/ckeditor.js"></script>
        <script src="libs/ckeditor/_samples/sample.js" type="text/javascript"></script>
        
        
        <link href="skins/css/body.css" rel="stylesheet" type="text/css" />
        <link href="skins/css/mainView.css" rel="stylesheet" type="text/css" />
        <link href="skins/css/navig_left_menu/left_menu.css" rel="stylesheet" type="text/css" />
        <link href="skins/css/right_td.css" rel="stylesheet" type="text/css" />
        <link href="skins/css/button.css" rel="stylesheet" type="text/css" />
        <link href="skins/css/forms.css" rel="stylesheet" type="text/css" />
        
        <link href="libs/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />





        <title>Економіка/admin </title>

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


                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="clear: both"> </div>
            <div id="empty"></div>

        </div>
        <div id="footer"><hr> </div>
    </body>
</html>