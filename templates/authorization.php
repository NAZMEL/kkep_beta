
<script>
    $(document).ready(function() {
        $('#messageBox').hide();
        $('#submit1').click(function(){
            var login = $("#login").val();
            var password = $("#paswrd").val();
            var fail = "";
            if(login === ""){
                fail = "Ви не ввели адресу електронної пошти!";
            }
            
            else if(login.split('@').length - 1 == 0 || login.split('.').length -1 == 0)
                fail = "Ви не вірно ввели електронну пошту!";
            else if(password== ''){
                fail = "Ви не ввели пароль!";
            }
            else if(password.length < 8)
                fail = "Пароль повинен включати не менше 8 символів!";
            if(fail != ""){
                $('#messageBox').html(fail);
                
                $('#messageBox').show();
                return false;    
            }
            
//            $.ajax({
//                url: '/templates/ajax/auth.php', //сюди надсилаються дані
//                type: 'POST',
//                
//                data: {login: login, paswrd: password},
//                dataType: 'html',
//                success: function(data){
//                        $('#messageBox').html(data);
//                        $('#messageBox').show();
//                        if(data == "Ви увійшли"){
//                             setTimeout(function() {window.location.reload(window.location.hostname);}, 1000);
//                        }
//            }     
//            });
            
//             $.post('/templates/ajax/auth.php', {login: login, paswrd: password}, function(data){
//                       $('#messageBox').html(data);
//                        $('#messageBox').show();
//                        if(data == "Ви увійшли"){
//                             setTimeout(function() {window.location.reload(window.location.hostname);}, 1000);
//                        }
//                   })
            
            
        });
        
    });
   
</script> 

<div>
            <form action="templates/ajax/auth.php" method="post">
            <div>
                <p class="auth"><label for="mail">Авторизація</label></p>
                
                <p style="margin-left: 40px;"><input type="email" name="login" id="login" placeholder="example@gmail.com"></p>
                
                <p style="margin-left: 40px;"><input type="password" name="paswrd" id="paswrd" placeholder="password" ></p>
            </div>
            <div style="margin-top: -10px;">
                <input type="submit"  id="submit1" value="Увійти">
                <input type="reset" id="reset1" value="Скинути"> 
            </div>
       </form>
        <p style="text-indent: 1cm; "><a href="" id="formm">Не вдалося увійти</a>&#8195;<a id="formm" href="registration.php" >Реєстрація</a></p>
        
        <center id="messageBox"><?php if(isset($_SESSION['message'])){$message = $_SESSION['message']; echo $message;}?></center>
        <?php
    if(isset($_SESSION['message'])){
        unset($_SESSION['message']);
    }
    ?>
        
</div>

    
  