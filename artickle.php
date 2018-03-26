<?php
    session_start();
    
    require_once "includes/config.php"; 
    $news = getNew($_GET['id']);
    $title = $news["title"];
    include_once "templates/header.php";
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
  

?>
   
    <!-- Блок новин -->    

        <div id= "new" > 
          <img src="/images/user.png" title="Автор новини" alt="Автор новини" style=" position: absolute; width: 15px; height: 15px; margin-top: 3px;"/>
            <span style="color:grey; margin-left: 20px;"><?= $news['author']; ?></span>
            <span  id="Date" title="Опубліковано"> <?= $news['date'];?><img src="images/Datetime.png" title="Час публікації" alt="Час публікації" style=" position: absolute; width: 25px; height: 25px;  margin-top: -3px;"/></span>
            <hr style="color: grey; margin-top: 5px; border-style: dashed;"/>
            
            <?php 
            if(isset($_SESSION['id'])){
                if((is_module($_SESSION['id'])) || ($_SESSION['username'] == $news['author'])){
                include_once("edit_news.php");}
            }?>


            
                <div id ="text" style="width: 980px;">
                    
                    <div style="text-align: center;  color: #F07676;"><h2><?= $news['title'];?> </h2></div>
                    
                    <?php
                    if(get_image_news($news['id'])){
                    ?>
<!--                    <img src="news/images/<?= get_image_news($news['id']);?>" alt="Зображення" width="500px" height="600px" style="margin-left: 205px; border: outset;">-->
                    <a href="news/images/<?= get_image_news($news['id']);?>" class="highslide" 
			 onclick="return hs.expand(this)"><img  src="news/images/<?= get_image_news($news['id']);?>" style=" position: relative; max-width: 450px; max-height: 500px; margin: 15px; margin-left: 205px;" /></a> 
                    <br/><br/>    <?php 
                    }
     if($news['full_text'] != ""){
         ?>
     
                    <div id="main_news" style="margin-left: 10px; font-size: 21px;line-height:25px; text-indent: 1cm; "><?=$news['full_text']?></div> 
                    
               <?php
     }

    if(get_files($news['id'])){
         $arr = get_files($news['id']);
          for($i=0; $i<count($arr); $i++){
              ?>
                    <a href="news/files/<?= $arr[$i];?>" download  style="margin-left: 25px; font-size: 21px; color: blue;"><?= $arr[$i];?></a><br/>    <?php 
          }
    }
     if(get_youtube($news['id'])){
         ?>
         <br/>
          <iframe style="margin-left: 100px;" width="800" height="420" src="<?=get_youtube($news['id'])?>" frameborder="1" allowfullscreen ></iframe>
<!--          <iframe style="margin-left: 100px;" width="800" height="420" scrolling="no" src="http://ktonanovenkogo.ru/html/html-new/embed-object-html-tegi-media-kontenta-video-flesh-veb-stranicax.html" frameborder="1" allowfullscreen ></iframe>-->
        
         <?php
     }
                    
       if(get_video_news($news['id'])){
         ?>
         <br/>
          <iframe style="margin-left: 100px;" width="800" height="420" src="news/videoes/<?=get_video_news($news['id'])?>" frameborder="1" allowfullscreen ></iframe><br/> 
           
     <?php        
     }
            
      if(get_more_image($news['id'])) {
          $arr = get_more_image($news['id']);
          for($i=0; $i<count($arr); $i++){
              ?>
                    <br/><br/><hr/><br/><br/>
<!--                    <img src="news/images/<?= $arr[$i];?>" alt="Зображення" width="550px" height="600px" style="margin-left: 205px; border: outset;">-->
                     
                     <a href="news/images/<?= $arr[$i];?>" class="highslide" 
			 onclick="return hs.expand(this)"><img  src="news/images/<?= $arr[$i];?>" style=" position: relative; width: 550px; height: 600px; margin: 15px; margin-left: 205px;" /></a> 
			 
<!--
			 <a href="news/images/<?= $arr[$i];?>" class="highslide" 
			 onclick="return hs.expand(this)"><img  src="news/images/<?= $arr[$i];?>" style=" position: relative; width: 283px; height: 260px; margin: 15px;" /></a>
-->
                    <br/>    
                    
                   <?php 
          }
      }
          
          ?>
</div>
             
            <hr style="color: grey; border-style: dashed;"/>
             <span style="position: absolute;  font-size: 20px;"><img src="images/Eye1.png" alt="Переглянули" title="Переглянули" id="view" style=" width: 20px; height: 20px; "><span title="Переглянули"> <?= count_views($news['id']);?></span></span>
             
             <span title="Порокоментували" style="position: absolute; font-size: 20px; margin-left: 100px;"><img src="images/Koment.png" alt="Прокоментували" id ="coment" style=" width: 25px; height: 25px; "></span>&nbsp<span title="Порокоментували" id="koment" style="margin-left: 125px; font-size: 20px;"><a href="#comment_style"><?= $news["comments"];?></a></span>
             <?php require_once('like.php'); ?>
    <br/><br/>             
<div id="comment_style" >
     <?php
        if(count_comment_new($news['id'])){
            $comment = get_comment($news['id']);
           
                for($i = 0; $i < count_comment_new($news['id']); $i++){
        echo '<div id="comment_one">';
                    
                    
                    $avatar = get_avatar(get_id_author($comment[$i]['comment_author']));
                        if($avatar == '') {$avatar = "default.png";}
                
                        ?><img id="comment_avatar" src="images/admin/<?=$avatar;?>"/>
                        <span id="comment_username"><?= $comment[$i]['comment_author'];?></span>
                        <span id="comment_date"><?= $comment[$i]['date'];?></span>
                        
                        <div id="comment_content">
                          <?php
                           if(isset($_SESSION['comments_edit_id']) and $_SESSION['comments_edit_id'] == $comment[$i]['id']){
                           ?>
                           <form action="includes/comment_edit.php?name=save" method="post">
                        <textarea name="comment_content_change" id="comment_content_change" style="resize: none;
    margin-left: 20px; border-radius: 5px; border: 1px solid grey; font-size: 18px; font-family: Times New Roman; padding: 10px;" cols="70" rows="5"><?= $comment[$i]['content'];?></textarea>
    <input id="comment_change_submit" type="submit" id="change" value="Зберегти"/>
<!--    <a style="position: absolute;  margin-left: -60px; margin-top: 100px; color: brown;" id="comment_change" href="includes/comment_edit.php?name=save">Зберегти</a>-->

    </form>
            <?php
                }
                      else{?>      
                           <?= $comment[$i]['content'];
                      }
                            ?>
                        </div>
                        <br/>
                        <?php
                    
                    if(isset($_SESSION['username'])){
                        if($_SESSION['username'] == $comment[$i]['comment_author']){
                        ?>
                            <div style="positon: absolute; margin-left: 650px;">
                               <?php $_SESSION['date_comment'] = $comment[$i]['date'];
                            $_SESSION['id_news']  = $news['id'];
                                ?>
                                <a id="comment_change" href="includes/comment_edit.php?name=edit">Редагувати</a><span id="comment_change" >|</span>
                                <a id="comment_change" href="includes/comment_edit.php?name=delete">Видалити</a>
                            </div><br/>
                            <?php
                        }
                    }
                    
           ?>         
    <?php
        echo '</div>';     
            }   
        }
    else{
        echo '<center style="font-size: 22px;">Коментарів на даний момент немає!</center>';
    }     
    ?>
    <?php
            if(isset($_SESSION["username"])){
                echo '<br/><br/>';
                include_once("comments.php"); 
                
            } 
            else{
                echo '<br/>';
                echo '<center style="font-size: 22px; color: red;">Для коментування необхідно авторизуватись!</center>';
            }
    echo '<br/>';
            ?>
</div>
<br/><br/>
</div>
</div>      
<?php  
    require "templates/footer.php";
?>    

