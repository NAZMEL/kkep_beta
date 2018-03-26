<?php
session_start();
    $title = "Відеогалерея";
    include_once "templates/header.php";
    require_once "includes/config.php"; 
    include_once "templates/main_menu.php";
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
    <!-- Блок новин -->  
    <div id= "news" >
    <br/>
     <center style="position: relative; font-size: 25px; font-weight: bold; text-decoration: underline;">Наші відео</center>
      <?php
    $dir= "news/videoes/";
    if(is_dir($dir)){
           if($descriptor = opendir($dir)){
                
               while($file = readdir($descriptor)){
                  
                    if($file != '.' && $file != ".."){
        ?>
                   <br/><hr/>
        <?php
            if(isset($_SESSION['id'])){ 
                if(is_module($_SESSION['id'])){
            ?>
                   <div  style="margin-left: 435px;" class="aaa"><img class="edit_news" src="/images/edit_menu.png"/>
<ul  class="edit_news2">
<li id="del_new" name="del_new"><a href="templates/del_video.php?name=del_<?= $file?>">Видалити</a></li>
</ul></div>
                       <?php 
                        } }
                        ?>
                       

                   <br/>
                    <iframe style="margin-left: 100px; margin-top: 25px;" width="800" height="420" src="news/videoes/<?= $file; ?>?autoplay=0&amp;loop=0&amp;&amp;playlist=<?=$file?>" frameborder="1" allowfullscreen ></iframe>
                    <br/>
                     <?php
                    }
                }
               echo '<br/><br/>';
            }
    }
        closedir($descriptor);
        ?>
       
    </div>
</div>
<?php
    require "templates/footer.php";
?>   


