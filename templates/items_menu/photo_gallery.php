 <?php
session_start();
$title= "Фотогалерея";
    include_once($_SERVER['DOCUMENT_ROOT']."/templates/main_content/header.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/templates/includes/config.php"); 
    include_once($_SERVER['DOCUMENT_ROOT']."/templates/main_content/main_menu.php");
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
    <!-- Блок новин -->
    <div id= "news" >

       <div class="highslide-gallery">
<!--
        <a href="http://millionstatusov.ru/pic/statpic/all/58e61335ec518.jpg" class="highslide" type="image/jpg" onclick="return hs.expand(this)">
            <img id="photo_gallery"  src="http://millionstatusov.ru/pic/statpic/all/58e61335ec518.jpg" />
         </a>
           <a href="news/images/2.jpg" class="highslide" onclick="return hs.expand(this)">
            <img id="photo_gallery" src="news/images/2.jpg" />
         </a>
-->
        <?php
    $dir= "/news/images/";
    if(is_dir($dir)){
           if($descriptor = opendir($dir)){      
               while($file = readdir($descriptor)){      
                    if($file != '.' && $file != ".."){
        ?>
                     <a href="/news/images/<?=$file; ?>" class="highslide" 
			 onclick="return hs.expand(this)">
                        <img  src="/news/images/<?=$file; ?>" style=" position: relative;
    width: 283px;
    height: 260px;
    margin: 15px;" />
                    </a>
                     <?php
                    }
                }
                closedir($descriptor);
            }
    }
       
        ?>
         </div>
      

         <div style="clear:both"></div>   
    </div>
</div>
<?php
    require($_SERVER['DOCUMENT_ROOT']."/templates/main_content/footer.php");
?>   
