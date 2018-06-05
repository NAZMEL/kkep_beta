<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/templates/includes/database.php") ;
    $title = "Спеціальності та екзамени";
    include_once($_SERVER['DOCUMENT_ROOT']."/templates/main_content/header.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/templates/includes/config.php"); 
    include_once($_SERVER['DOCUMENT_ROOT']."/templates/main_content/main_menu.php");
    //mb_internal_encoding("UTF-8");
    //echo mb_substr("kjfkjdf", 0, 5);
?>
<div id="golovna" >
<!-- Авторизація та реєстрація -->
<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/templates/main_content/left.php");
?>
    <!-- Головний фрейм -->
<?php
    require($_SERVER['DOCUMENT_ROOT']."/templates/main_content/main_images.php");
?>   
<div id= "news" >
 <center><h1>Спеціальності та вступні екзамени</h1></center>
 
<!--
 <center>Калуський коледж економіки, права та інформаційних технологій<br/> ІВАНО-ФРАНКІВСЬКОГО НАЦІОНАЛЬНОГО ТЕХНІЧНОГО УНІВЕРСИТЕТУ
НАФТИ ТА ГАЗУ 
ЗАПРОШУЄ НА НАВЧАННЯ</center>
-->

<p style="font-size: 20px; text-indent: 1cm;">У нашому закладі ви здобудете  освітньо-кваліфікаційний рівень <span style="color: red;">"молодший спеціаліст"</span> на основі:</p>
<ul style="list-style: circle; margin-left: 120px;">
<li style="font-size: 20px;">базової загальної середньої освіти (після 9 класу);</li>
<li style="font-size: 20px;">повної загальної середньої освіти (після 11 класу);</li>
</ul>
<br/><br/>

<table width="90%"  cellspacing="0" cellpadding="10">
    <tr>
    <td style="font-weight: bold; text-align: center;">Спеціальність</td>
    <td style="font-weight: bold; text-align: center;">За результатами вступних випробувань на 1-й курс (випускники 9-х класів)</td>
    <td style="font-weight: bold; text-align: center;">За результатами ЗНО на 2-й курс (випускники 11-х класів)</td>
    <td style="font-weight: bold; text-align: center;">На базі ОКР "кваліфікований робітник" на 2-й курс</td>
    </tr>
    
    <tr>
        <td style="text-align: center; color:red; " >Фінанси, банківська справа і страхування</td>
        <td><ol type="1">
<li style="font-size: 20px;">Українська мова (диктант)</li>
<li style="font-size: 20px;">Математика (тести)</li>
</ol></td>
        <td><ol type="1">
<li style="font-size: 20px;">Українська мова та література</li>
<li style="font-size: 20px;">Математика</li>
</ol></td>
        <td>Вступний іспит з української мови, фахове вступне випробування (з основ економіки)</td>
    </tr>
    <tr>
        <td style="text-align: center; color:red; " >Менеджмент</td>
        <td><ol type="1">
<li style="font-size: 20px;">Українська мова (диктант)</li>
<li style="font-size: 20px;">Математика (тести)</li>
</ol></td>
        <td><ol type="1">
<li style="font-size: 20px;">Українська мова та література</li>
<li style="font-size: 20px;">Математика</li>
</ol></td>
        <td>Вступний іспит з української мови, фахове вступне випробування (з основ економіки)</td>
    </tr>
    <tr>
        <td style="text-align: center; color:red;" >Комп'ютерна інженерія</td>
        <td><ol type="1">
<li style="font-size: 20px;">Українська мова (диктант)</li>
<li style="font-size: 20px;">Математика (тести)</li>
</ol></td>
        <td><ol type="1">
<li style="font-size: 20px;">Українська мова та література</li>
<li style="font-size: 20px;">Математика</li>
</ol></td>
        <td>Вступний іспит з української мови, фахове вступне випробування (з основ інформатики)</td>
    </tr>
    <tr>
        <td style="text-align: center; color:red;" >Право</td>
        <td><ol type="1">
<li style="font-size: 20px;">Українська мова (диктант)</li>
<li style="font-size: 20px;">Історія України (тести)</li>
</ol></td>
        <td><ol type="1">
<li style="font-size: 20px;">Українська мова та література</li>
<li style="font-size: 20px;">Історія України</li>
</ol></td>
        <td>Вступний іспит з української мови, фахове вступне випробування (з основ правознавства)</td>
    </tr>
</table>
<br/> <br/>

</div>
</div>    

<?php
    require($_SERVER['DOCUMENT_ROOT']."/templates/main_content/footer.php");
?>   
