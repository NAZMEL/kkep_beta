<?php
session_start();
require_once "includes/database.php";
    $title = "Приймальна комісія";
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

?>   
<div id= "news" >
<center style="margin-top: 15px;font-size: 25px; font-weight: bold; " >Положення про приймальну комісію</center><br/>

<a href="/news/menu/polozennya.doc" download style="margin-left: 50px;  font-size: 23px; color: blue;" id="file_download">polozennya.doc</a>
<br/><br/>
</div>
 <?php
    include_once("templates/widget_a.php");
    ?><br/><br/>
</div>    

<?php
    require "templates/footer.php";
?>   
