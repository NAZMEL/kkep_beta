<?php
    session_start();

    $title = "Admin-панель";
    include_once "templates/header.php";
    require_once "includes/config.php";
    include_once "templates/main_menu.php";

    if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit;
    }
?>
<div style="position: static;margin-left: 400px; margin-top: 100px; background-color: #D5FFD0; width: 1000px; border: 1px solid black; padding: 30px; height: 1350px;" >
   
    <center><h1>Додати новину</h1></center>
    
       <?php
    if(isset($_SESSION['msg'])){
    ?> <div id="oblik_error"><?php echo $_SESSION['msg'];?></div><?php
        unset($_SESSION['msg']);
    }
    ?>
      <br/> 
      <br/> 
      <br/> 
    <form enctype="multipart/form-data" name="new_artickle" method="POST" action="includes/set_news.php" >
        <label>Назва статті:</label>
        <input type="text" name="title" /><br/>
        
        <label>Повний текст:</label><br/>
        <textarea name="full_text" rows="30" cols="120" style="resize: none; font-size: 16px; font-family: Times New Roman;"></textarea><br/>
        <br/>
        <hr/>        <br/>
    <div style="border: 1px solid grey; padding: 15px; border-radius: 10px; background-color: #CEFFFF;">
              <label style="font-size: 20px;">Додати головне зображення:</label>
            <input type="file" name="image" accept="image/*"/>
             
            <br/><br/><hr/><br/><label style="font-size: 20px;">Додати проміжні зображення:</label>
            <input type="file" name="image_more[]" multiple accept="image/*"/>
          

       <br/><br/><hr/><br/>
       <label style="font-size: 20px;">Додати ссилку на сайт:</label>
       <input type="text" name="url" style="margin-left: 30px; width: 682px; " disabled/>
      <br/><hr/><br/>
       <label style="font-size: 20px;">Додати ссилку на відео YouTube:</label>
       <input type="text" name="youtube" style="margin-left: 30px; width: 600px; "/>
       <hr/><br/>
        <label style="font-size: 20px;">Додати файли:</label>
            <input type="file" name="file[]" style="margin-left: 50px; width: 682px;" multiple/>
<br/><hr/><br/>
        <label style="font-size: 20px;">Додати відео:</label>
            <input type="file" name="video" style="margin-left: 50px; width: 682px;" accept="video/*"/>
    </div> 
        
        <input type="submit" name="set_new" value="Опублікувати новину" id="set_new"/><br/>
    </form>  
    <br/><br/>

</div>

<!--
<script>
    $(document).ready(function(){
          $('#set_new').click(function(){
        $('#message').hide();
    var title = $("#title").val
       var full_text = $("#full_text").val
      
        $.ajax({
            url: "set_news.php",
            type: "POST",
            cache: false,
            data: ({title: title, full_text: full_text}),
            dataType: 'html', 
            success:function(data){
                $('#message').html(data);
                $('#message').show(); 
                return false;
            }
        });
    }) ;          
    });

</script>
-->
<?php
    require "templates/footer.php";
?> 