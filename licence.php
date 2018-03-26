<?php
session_start();
require_once "includes/database.php";
    $title = "Ліцензії та сертифікати";
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
<center style="margin-top: 15px;"><a href="http://old.mon.gov.ua/ru/about-ministry/normative/2518-" style="font-size: 25px; font-weight: bold;" target="_blank" id="licence_title">Наказ Міністерства №752 від 24.06.2014</a></center><br/>

<p style="font-size: 20px; text-indent: 50px;">Про заходи, пов'язані з утворенням Калуського коледжу економіки,
права та інформаційних технологій
Івано-Франківського національного технічного університету нафти та газу.</p>

<center><img src="images/menu/licence.jpg" style="border: 1px solid black; margin-bottom: 15px; "></center>

<a id="licence_see_full" href="https://docs.google.com/viewer?url=http://old.mon.gov.ua/files/normative/2014-06-26/2518/nmon_752_24062014.pdf&embedded=false" target="_blank" >Переглянути повністю</a>
<a id="licence_see_full" href="news/menu/nmon_752_24062014.pdf" download>Завантажити</a><br/><br/>

</div>
</div>    

<?php
    require "templates/footer.php";
?>   
