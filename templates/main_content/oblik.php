<?php
    session_start();
    
    $title = "Мій обліковий запис";
    include_once "templates/header.php";
    require_once "includes/config.php";
     include_once "templates/main_menu.php";

    if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit;
    }

?>




<div style="position: static;margin-left: 400px; margin-top: 100px; background-color: #D5FFD0; width: 1000px; border: 1px solid black; padding: 30px; height: 700px;" >
    <center><h1>Налаштування облікового запису</h1></center> 
       <?php  
        $avatar = get_avatar($_SESSION['id']);
        if($avatar == '') 
            {$avatar = "default.png";}
       
    ?>
    
    
     <img id="avatar_img" src="images/admin/<?=$avatar;?>"  style="position: static;width: 200px; height: 200px; float: left; border: 1px solid #B0C4DE; display: block; background-color: #FFF5EE; border-radius: 100px;"/>
       
       
       
       
        <form style="margin-top: 60px;" enctype="multipart/form-data" method="post" action="uploading.php">
           <label style="margin-left: 50px; font-size: 20px;">Додати фото:</label>
            <input type="file" name="ava"/><br/>
            <input  id="change_admin_image" type="submit" value="Прикріпити"/>
        </form>
        
        
        
         <?php
    if(isset($_SESSION['msg'])){
    ?> <div id="oblik_error"><?php echo $_SESSION['msg'] . '<br/>';?></div><?php
        unset($_SESSION['msg']);
    }
         
?>
        <div style=" margin-left: 250px; margin-top: 50px;">
        <form action="includes/admin_base.php" method="POST">
        <label>Змінити ім'я:</label><br/>
        <input id="name" name = 'name' type="text" value="<?= get_name($_SESSION['id']);?>"><br/>
        
        <label>Змінити електронну пошту:</label><br/>
        <input id="login" name = 'login' type="text" value="<?= get_login($_SESSION['id']);?>"><br/>
        
        <label>Змінити пароль:</label><br/>
        <label>Введіть свій існуючий пароль:</label><br/>
        <input id="password_old" name='password_old' type="password"><br/>
        <label>Введіть новий пароль:</label><br/>
        <input id="password_new" name='password_new' type="password"><br/>
        <input id="change" type="submit" value="Зберегти зміни"/>
        </form>
        </div>
        <center id="message" style="position: inherit;"></center>
        
</div>



<!--
<script>
    $(document).ready(function(){
          $('#change').click(function(){
        $('#message').hide();
    var name = $("#name").val
       var login = $("#login").val
       var password_old = $("#password_old").val
       var password_new = $("#password_new").val
        $.ajax({
            url: "templates/ajax/admin_base.php",
            type: "POST",
            cache: false,
            data: ({name: name, login: login, password_old: password_old, password_new: password_new}),
            dataType: 'html', 
            success:function(data){
                $('#message').html(data);
                $('#message').show();     
            }
        });
    }) ;          
    });

</script>
-->

