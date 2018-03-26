<?php
session_start();
require_once "includes/database.php";
    $title = "Документи для вступу";
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
<!-- <center><h1>Інформація про документи для вступу</h1></center>-->
 
<br/>
<center> <span style="font-size: 22px; color: red;">Документи, які необхідні абітурієнту при вступі до
Калуського коледжу економіки, права та інформаційних технологій</span><br/><span> ІВАНО-ФРАНКІВСЬКОГО НАЦІОНАЛЬНОГО ТЕХНІЧНОГО УНІВЕРСИТЕТУ
НАФТИ ТА ГАЗУ</span>
</center><br/>
<ol type="1" style="margin-left: 10px;">
<li style="font-size: 19px; margin-bottom: 5px;">Заява (заповнюється в приймальній комісії);</li>
<li style="font-size: 19px; margin-bottom: 5px;">Документ державного зразка про раніше здобутий освітній (освітньо-кваліфікаційний) рівень і додаток до нього (оригінал та 2 копії);</li>
<li style="font-size: 19px; margin-bottom: 5px;">Сертифікат (сертифікати) відповідного рівня ЗНО (для вступників на основі повної загальної середньої освіти);</li>
<li style="font-size: 19px; margin-bottom: 5px;">Чотири кольорові фотокартки розміром 3х4см;</li>
<li style="font-size: 19px; margin-bottom: 5px;">Копія документа, що посвідчує особу;</li>
<li style="font-size: 19px; margin-bottom: 5px;">Копія довідки державної податкової адміністрації про присвоєння ідентифікаційного номера;</li>
<li style="font-size: 19px; margin-bottom: 5px;">Копія паспорта та довідки державної податкової адміністрації про присвоєння ідентифікаційного номера одного із батьків;</li>
<li style="font-size: 19px; margin-bottom: 5px;">Копія військового квитка (посвідчення про приписку до призовної дільниці);</li>
<li style="font-size: 19px; margin-bottom: 5px;">Чотири конверти з марками (два з них адресовані абітурієнтом на домашню адресу);</li>
<li style="font-size: 19px; margin-bottom: 5px;">Пластикова прозора папка;</li>
<li style="font-size: 19px; margin-bottom: 5px;">Документи, які визначають пільги при зарахуванні абітурієнта.</li>
</ol>
<br/><br/>
<hr style="color: grey;"/>
<p style="font-size: 19px; text-indent: 50px; line-height: 25px;">Для осіб, <span style="color:red;">які не досягли 18-річного віку </span>при подачі документів для вступу обов'язкова <span  style="color:red;">присутність одного з батьків (усиновлювачів) або піклувальників</span> з паспортом для надання згоди на обробку персональних даних відповідно до Закону України<span style="color:red;"> "Про захист персональних даних"</span>.</p>
    
<br/><br/>
</div>
</div>    

<?php
    require "templates/footer.php";
?>   
