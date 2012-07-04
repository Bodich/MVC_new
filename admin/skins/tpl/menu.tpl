<!-- skins/tpl/menu.tpl begin --> 
Сегодня <?php echo formatDate(date("Y-m-d"), false) ?> года 
<div class="tabbable tabs-left">
     
    <p align="center"><b>Категорії</b></p><br>
    <ul class="nav nav-tabs">
        <li class="active"><a href="?do=cat&action=add">Добавити категорію</a></li> 
        <li><a href="?do=cat&action=update">Редагувати категорію</a></li> 
        <li><a href="?do=cat&action=del">Видалити категорію</a></li> 
    </ul>
     <p align="center"><b>Статті</b><br>
    <ul class="nav nav-tabs">
        <li><a href="?do=art&action=add">Добавити статью</a></li> 
        <li><a href="?do=art&action=update">Редагувати статью</a></li> 
        <li><a href="?do=art&action=del">Видалити статью</a></li>  
    </ul>

</div>


<ul> 
</ul> 
<!--
<ul> 
    <li><a href="?page=main">Главная страница</a></li> 
    <li><a href="?page=second">Вторая страница</a></li> 
</ul> -->

<!-- skins/tpl/menu.tpl end -->