<?php
session_start();
require_once "includes/database.php";
    $title = "Адміністрація";
    include_once "templates/header.php";
    require_once "includes/config.php"; 
    include_once "templates/main_menu.php";
    //mb_internal_encoding("UTF-8");
    //echo mb_substr("kjfkjdf", 0, 5);
?>
<div id="golovna" >
<!-- Авторизація та реєстрація -->
<?php
    include_once "templates/left.php";
?>
    <!-- Головний фрейм -->
<?php
    require "templates/main_images.php";
    //print_r($news[0]['author']); 
?>   
<div id= "news" >
<br/>
<center  ><b style="font-size: 20px;">Директор коледжу</b></center><center style="font-size: 18px;">
Тимків Ганна Ярославівна</center>
<center><img src="images/menu/administracia/director.jpg" style="width: 500px; height: 400px; border: 1px solid black;" >
</center><br/><br/>

<center>
<b style="font-size: 20px;">Заступник директора з навчальної роботи</b><br/>
<span style="font-size: 18px;">Відливаний Петро Михайлович</span>
</center>
<center><img src="images/menu/administracia/zam1.jpg" style="width: 450px; height: 400px; border: 1px solid black;"></center>
<br/><br/>

<center style="text-size: 20px; text-weight: bold;">
<b style="font-size: 20px;">Заступник директора з навчально-виховної роботи</b><br/>
<span style="font-size: 18px;">Добровольська Галина Богданівна</span>
</center>
<center ><img src="images/menu/administracia/zam2.jpg" style="width: 500px; height: 400px; border: 1px solid black;" >
</center><br/>



</div>
</div>    

<?php
    require "templates/footer.php";
?>   
