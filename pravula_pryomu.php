<?php
session_start();
require_once "includes/database.php";
    $title = "Правила прийому";
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
 <center><h1>Правила прийому у 2017 році</h1></center>
 <br/>
<a style="margin-left: 15px; font-size: 20px; color: blue;" href="news/menu/onovlen-pravila-priyomu-2017.doc">onovlen-pravila-priyomu-2017.doc</a>
<br/> <br/>

</div>
</div>    

<?php
    require "templates/footer.php";
?>   
