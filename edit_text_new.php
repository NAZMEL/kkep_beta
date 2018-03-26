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
<div style="position: static;margin-left: 400px; margin-top: 100px; background-color: #D5FFD0; width: 1000px; border: 1px solid black; padding: 30px; height: 900px;" >
   
    <center><h1>Редагувати новину</h1></center>
    
       <?php
    if(isset($_SESSION['msg'])){
    ?> <div id="oblik_error"><?php echo '<div style=\"position: relative\">'.$_SESSION['msg'].'</div>' . '<br/>';?></div><?php
        unset($_SESSION['msg']);
    }
    ?>
      <br/> 
      <br/> 
      <br/> 
      <?php
    $id_new =$_GET['id_new']; 
    $location = "artickle.php?id= $id_new";
   if(get_reg_new($_GET['id_new'])){
        $tmp = get_reg_new($_GET['id_new']);
    ?>
        <label>Назва статті:</label>
        <input id="title" type="text" name="title" value="<?= $tmp['title'] ?>" /><br/>
        
        <label>Повний текст:</label><br/>
        <textarea id="full_text" name="full_text" rows="30" cols="120" style="resize: none; font-size: 16px; font-family: Times New Roman;"><?= $tmp['full_text'] ?></textarea><br/>
        <br/>

        <input type="submit" name="set_new" value="Зберегти зміни" id="set_new"/>
    
    <?php 
   }
    else{
       header("Location: ../artickle.php?id='".$_GET['id_new']."' ");
        exit;
    }
    ?>
  
    <br><br/>
<center  style="font-size: 21px; color: red;" id="message"></center>
</div>


<?php
    require "templates/footer.php";
?> 
<script>
    var id_new = <?php echo $_GET['id_new']?>;
    $(document).ready(function(){
          $('#set_new').click(function(){
        $('#message').hide();
            
    var title = document.getElementById('title').value;
       var full_text = document.getElementById('full_text').value;

                  
      $.post('/templates/edit_text_new2.php', {id_new: id_new, title: title, text: full_text}, function(data){
          $('#message').html(data);
          $('#message').show();
        setTimeout(function() {window.location.reload()}, 2500);
//          ("artickle.php?id="+id_new)
      })
    });          
    });

</script>
