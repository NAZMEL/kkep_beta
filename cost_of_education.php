<?php
session_start();
require_once "includes/database.php";
    $title = "Вартість навчання";
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
 <center><h1>Плата за рік навчання</h1></center>
 <p style="text-indent: 30px; font-size: 20px;">Калуський коледж економіки, права та інформаційних технологій - заклад державної форми власності. Навчання в коледжі здійснюється за:</p>
<ul style="list-style: circle; margin-left: 120px; font-size: 20px;">
    <li>державним замовленням (безкоштовно);</li>
    <li>контрактною формою навчання.</li>
</ul><br/><br/>
<table  width="50%"  cellspacing="0" cellpadding="10" style="margin-left: 250px;">
    <tr>
        <td style="font-weight: bold; text-align: center;">Спеціальність</td>
        <td style="font-weight: bold; text-align: center;">Плата за один рік навчання
(за контрактною формою), грн.</td>
    </tr>
    <tr>
        <td style="color: red; text-align: center;">Комп'ютерна інженерія</td>
        <td style="text-align: center;">6000</td>
    </tr>
    <tr>
        <td style="color: red; text-align: center;">Фінанси, банківська справа і страхування</td>
        <td style="text-align: center;">5700</td>
    </tr>
    <tr>
        <td style="color: red; text-align: center;">Менеджмент</td>
        <td style="text-align: center;">5500</td>
    </tr>
    <tr>
        <td style="color: red; text-align: center;">Правознавство</td>
        <td style="text-align: center;">7500</td>
    </tr>
</table>


<br/> <br/>
</div>
</div>    

<?php
    require "templates/footer.php";
?>   
