<?php
session_start();
require_once "includes/database.php";
    $title = "ККЕПІТ ІФНТУНГ";
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

   <div  style="font-weight: bold;font-size: 25px; color: black;padding: 15px; margin-left: 400px; text-decoration: underline;">Результати пошуку</div>
    <?php
    if(isset($_GET['enter_search']) && (!empty($_GET['search']))){
        $words = htmlspecialchars($_GET['search']);
        
        if(search_artickles($words))
        {
            $news = search_artickles($words);
            for($i = 0; $i < count(search_artickles($words)); $i++){
             ?>
               <div id= "news" >
           <img src="/images/user.png" title="Автор новини" alt="Автор новини" style=" position: absolute; width: 15px; height: 15px; margin-top: 3px;"/>
            <span style="color:grey; margin-left: 20px;"><?= $news[$i]['author']; ?></span>
            
            <span  id="Date" title="Опубліковано" ><?= $news[$i]['date'];?><img src="images/Datetime.png" title="Час публікації" alt="Час публікації" style=" position: absolute; width: 25px; height: 25px;  margin-top: -3px;"/></span>
            <hr style="color: grey; margin-top: 5px; border-style: dashed;"/>
            
            <div id ="text" style="postion: relative; width: 980px; min-height: 400px; ">
                    
                    <a style="text-align: center;  color: #F07676;" href="/artickle.php?id=<?=$news[$i]['id'];?>"> <h2><?= $news[$i]['title'];?> </h2></a>
                <?php
                    if(get_image_news($news[$i]['id'])){
                    ?>
                    
                    <img src="news/images/<?= get_image_news($news[$i]['id']);?>" alt="Зображення" width="400px" height="300px" style="  float:left;margin-right: 15px; border: outset;">    <?php 
                    }
     if($news[$i]['full_text'] != ""){
         ?>
     
                    <div id="main_news" style="margin-left: 10px; font-size: 21px;line-height:25px; text-indent: 1cm; "><?=substr($news[$i]['full_text'], 0, 3000).'...';?><a style="color: grey; font-style: italic;" href="/artickle.php?id=<?= $news[$i]['id']?>"> читати далі.</a></div> 
                    
               <?php
     }
     
     if(get_youtube($news[$i]['id'])){
         ?>
         <br/>
          <iframe style="margin-left: 100px;" width="800" height="420" src="<?=get_youtube($news[$i]['id'])?>" frameborder="1" allowfullscreen ></iframe><br/>
         <?php
     }
     
     if(get_video_news($news[$i]['id'])){
         ?>
         
          <iframe style="margin-left: 100px;" width="800" height="420" src="news/videoes/<?=get_video_news($news[$i]['id'])?>" frameborder="1" allowfullscreen></iframe>
     <?php    
     }
     ?>
                
            </div>
           
            <hr style="position: relative; color: grey; border-style: dashed;"/>
             <span style="position: absolute;  font-size: 20px;"><img src="images/Eye1.png" alt="Переглянули" title="Переглянули" id="view" style=" width: 20px; height: 20px; "><span title="Переглянули"> <?= count_views($news[$i]['id'])?></span></span>
             
             <span title="Порокоментували" style="position: absolute; font-size: 20px; margin-left: 100px;"><img src="images/Koment.png" alt="Прокоментували" id ="coment" style=" width: 25px; height: 25px; "></span>&nbsp<span title="Порокоментували" id="koment" style="margin-left: 125px; font-size: 20px;"><a href="/artickle.php?id=<?=$news[$i]['id'];?>#comment_style"><?= $news[$i]["comments"];?></a></span>
             
             <span title="Сподобалось" style="position: absolute; margin-left: 750px; font-size: 20px;"><img id="like" src="images/like1.png" alt="Вподобали" style="width: 20px; height: 20px;" onclick="changeLike()">&nbsp<span id="count_likes"><?= $news[$i]['likes'];?></span></span>
    </div> 
           <?php
            }
        }
        else{
            echo "<div id='news' style='font-size: 25px; color: black;padding: 15px;'><center>За вашим запитом нічого не знайдено!</center></div>";
        }
    }
    else{
        echo "<div id='news' style='font-size: 25px; color: red;padding: 15px;'><center>Не заданий пошуковий запит!</center></div>";
    }
    
    ?>
    <br/>
    <?php
    include_once("templates/widget_a.php");
    ?>
 
</div>
<?php
    require "templates/footer.php";
?>

