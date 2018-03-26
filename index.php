<?php
session_start();
require_once "includes/database.php";
    $title = "ККЕПІТ ІФНТУНГ";
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
<?php
    if(!isset($_GET["page"])){
        $page = 1;
    }else{
         $page = $_GET["page"];
            if($page < 0 or $page == ""){
            $page = 1;
        }
    } 
    $limit = 11;
    
     //якщо дана сторінка перевищує кількість всіх сторінок , то присвоюємо їй ссилку на останню сторінку
    if(count_pages(countArtickles(), $limit) < $page){
        $page = count_pages(countArtickles(), $limit);
    }
    $start = getStart($page, $limit);
    $news = getNews($start, $limit);
    
    for($i = 0; $i < count($news); $i++)
    {?>

        <div id= "news" >
           <img src="/images/user.png" title="Автор новини" alt="Автор новини" style=" position: absolute; width: 15px; height: 15px; margin-top: 3px;"/>
            <span style="color:grey; margin-left: 20px;"><?= $news[$i]['author']; ?></span>
            
            <span  id="Date" title="Опубліковано" ><?= $news[$i]['date'];?><img src="images/Datetime.png" title="Час публікації" alt="Час публікації" style=" position: absolute; width: 25px; height: 25px;  margin-top: -3px;"/></span>
            <hr style="color: grey; margin-top: 5px; border-style: dashed;"/>
            
            <div id ="text" style="postion: relative; width: 980px;  ">
                    
                    <a style="text-align: center;  color: #F07676;" href="/artickle.php?id=<?=$news[$i]['id'];?>"> <h2><?= $news[$i]['title'];?> </h2></a>
                <?php
                    if(get_image_news($news[$i]['id'])){
                    ?>
                    
<!--                    <img src="news/images/<?= get_image_news($news[$i]['id']);?>" alt="Зображення" width="320px" height="350px" style="margin-left: 305px; border: outset;">  -->
                     
                    <a href="news/images/<?= get_image_news($news[$i]['id']);?>" class="highslide" 
			 onclick="return hs.expand(this)"><img  src="news/images/<?= get_image_news($news[$i]['id']);?>" style=" position: relative; width: 320px; height: 350px; margin: 15px; margin-left: 305px;" /></a> 
                      <?php 
                    }
     if($news[$i]['full_text'] != ""){
         ?>
     
                    <div id="main_news" style="margin-left: 10px; font-size: 21px;line-height:25px; text-indent: 1cm; "><?=substr($news[$i]['full_text'], 0, 3000).'...';?><a style="color: grey; font-style: italic;" href="/artickle.php?id=<?= $news[$i]['id']?>"> читати далі.</a></div> 
                    
               <?php
     }
     
    if(get_files($news[$i]['id'])){
         $arr = get_files($news[$i]['id']);
          for($j=0; $j<count($arr); $j++){
              ?>
                    <a href="news/files/<?= $arr[$j];?>" download  style="margin-left: 25px; font-size: 21px; color: blue;"><?= $arr[$j];?></a><br/>    <?php 
          }
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
             <?php
            if(isset($_SESSION['id'])){
            if(is_like($_SESSION['id'], $news[$i]['id'])){  
                $tmp ="images/like2.png";
            } else { 
                $tmp ="images/like1.png";
            }}
            else{
                $tmp ="images/like1.png";
            }?>
             <span title="Сподобалось" style="position: absolute; margin-left: 750px; font-size: 20px;"><img id="like" src="<?= $tmp ?>" alt="Вподобали" style="width: 20px; height: 20px;"  >&nbsp<span id="count_likes" onclick="return a(<?=$news[$i]['id']?>);"><?= $news[$i]['likes'];?></span></span>
             
            
    </div>
    
<?php 
    }
    
    $max = countArtickles();
    
    // "Попередня"
    if($page == 1){
        $page_last = 1;
    }
    else{
         $page_last = $page-1;
    }
   //"Наступна"
   if($page < count_pages(countArtickles(), $limit)){
       $page_next = $page + 1;
   }
    else{
        $page_next = $page;
    }
    
    
    if(count_pages(countArtickles(), $limit))
    {
    ?>
    <div id="page">

           <?php
        $last = "";
        $next = "";
        echo "<a id ='pagination' href='index.php?page=".$page_last."'>Попередня<a/>";
        echo "<a id ='pagination' href='index.php'>1<a/>";
        for($i = $limit, $j = 2; $i <= $max; $i += $limit, $j++){
            echo "<a id ='pagination' href='index.php?page=".$j."'>$j<a/>";
//            if($j ==  5){
//                echo "<a id ='pagination'>...<a/>";
//                for($k=count_pages(countArtickles(), $limit) - 3; $k <=  count_pages(countArtickles(), $limit); $k++){
//                    if($k == ($j+1)){
//                        $k++;
//                    }
//                    echo "<a id ='pagination' href='index.php?page=".$k."'>$k<a/>";  
//                }
//            break;    
//            }
        }
        echo "<a id ='pagination' href='index.php?page=".$page_next."'>Наступна<a/>";
        //echo pagination($page, $limit);
    ?>  
       
 <script>
        
           $(document).ready(function(){
//               $('#like').click(function(){
//            var id_new = <?php echo $news[$i]['id']?>;
               function a(id_new){
            var id_user = <?php echo $_SESSION['id']?>;
                   $.post('/templates/likes.php', {id_new: id_new, id_user: id_user}, function(data){
                       data = JSON.parse(data);
                       $('#count_likes').html(data['like']);
                       $('#like').attr("src",data['src'] );
                   });
               }
    //      });                                 
    });
                 
</script>
 
   </div>
   <?php
    }
    ?>
    <?php
    include_once("templates/widget_a.php");
    ?>
   </div>    
<?php
    require "templates/footer.php";
?>    



