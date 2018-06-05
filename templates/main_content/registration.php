   <?php
    $title = "Реєстрація";
    require($_SERVER['DOCUMENT_ROOT']."/templates/main_content/header.php");
    
    include_once($_SERVER['DOCUMENT_ROOT']."/templates/main_content/main_menu.php");
?>

 <script>
    $(document).ready(function() {
        $('#submit_registration').click(function(){
            $('#messageBox').hide();
            var name = $("#name").val();
//            var surname = $("#surname").val();
            var login = $("#login").val();
            var password1 = $("#new_password1").val();
            var password2 = $("#new_password2").val();
            
            var fail = "";
            
            if(login === ""){
                fail = "Ви не ввели адресу електронної пошти!";
            }
            
            else if(login.split('@').length - 1 == 0 || login.split('.').length -1 == 0)
                fail = "Ви не вірно ввели електронну пошту!";
            else if(password1 == '' || password2 == ''){
                fail = "Ви не ввели пароль!";
            }
            else if(password1.length < 8 || password2.length < 8)
                fail = "Пароль повинен включати не менше 8 символів!";
            else if(password1 != password2)
                fail = "Не вірно введено пароль!";
            else if(name == ''){
                fail = "Ви не ввели ім'я!";
            }
            else if(name.length < 3)
                fail = "Ім\'я занадто коротке!";
            else if(Number(name[0]))
                {
                    fail = "Перший символ імені не повинен бути цифрою!";
                }
            if(fail != ""){
                $('#messageBox').html(fail);
                $('#messageBox').show();
                return false;    
            }
            
            $.ajax({
                url: '/templates/ajax/feedback.php', //сюди надсилаються дані
                type: 'POST',
                cache: false,
                data: {name: name, login: login, password: password1},
                dataType: 'html',
                success: function(data){
                        $('#messageBox').html(data);
                        $('#messageBox').show();       
            }     
            });
        });
        
    });
   
     
     
    
</script>

<div id="golovna" onload="regStyle()">

<!-- Авторизація та реєстрація -->
<div class="auth_frame">
        <form action="auth.php" method="post"> 
            <div>
                <p class="auth"><label for="mail">Авторизація</label></p>
                
                <p style="margin-left: 40px;"><input type="email" name="mail" id="mail" placeholder="example@gmail.com" required disabled></p>
                
                <p style="margin-left: 40px;"><input type="password" name="paswrd" id="paswrd" placeholder="password" required disabled></p>
            </div>
            <div style="margin-top: -10px;">
                <input type="submit"  id="submit" value="Увійти" disabled>
                <input type="reset" value="Скинути" disabled> 
            </div>
        </form>
        <p style="text-indent: 1cm;" hidden="true"><a href="" class="form1" >Не вдалося увійти</a>&#8195;<a href="/templates/scripts/registration.php" class="form1" >Реєстрація</a></p>
    </div>
<div class="frame_2"> 
    наша фотогалерея
</div>
	
<div class="frame_3">
    Наш відео-альбом
</div>


<div class="frame_4">
    <p style="text-align: center; font-size: 20px; font-weight: 600; margin-bottom: 3px;">Ми на карті</p>
    <iframe src="https://maps.google.com.ua/maps/ms?aq=f&amp;ie=UTF8&amp;hl=uk&amp;msa=0&amp;msid=200634404030582179636.0004c4012e6e2eb5bfb80&amp;t=h&amp;source=embed&amp;ll=49.04356,24.352849&amp;spn=0.006751,0.01354&amp;z=15&amp;output=embed" width="275" height="324" frameborder="0" style="border:0" allowfullscreen></iframe>
</div> 


    <!-- Головний фрейм -->
<?php
    require($_SERVER['DOCUMENT_ROOT']."/templates/main_content/main_images.php");    
?>
    
    
        <!-- Блок реєстрації -->

<div id="block">
<span style="font-size: 46px; font-weight: bold; margin-left: 30px;;">Створення облікового запису користувача</span><br/><hr/>
<span style="font-size:20px;  text-indent: 2cm; margin-bottom: 10px;">Шановний відвідувач, з метою використання всіх можливостей нашого сайту Вам потрібно пройти реєстрацію. Реєстрація дозволить вам  додавати новини, інформацію, залишати свої коментарі тощо.</span>


<div id="form1">
<!--<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form1">-->
    
    <label style="font-size: 20px; ">Введіть ваш Email<span style="color: red; cursor: default"  title="Обов'язкове для заповнення">*</span></label> <br/>
    
   <input type="email" name="login" id="login" placeholder="username@domain.ex" /><br/>
   <span style="color: grey;">В подальшому дана адреса буде використовуватись як логін для входу у Ваш обліковий запис. Усі повідомлення із сайту будуть надсилатися на цю адресу. </span><br/><br/>
   
   <label style="font-size: 20px; ">Введіть пароль<span style="color: red; cursor: default;" title="Обов'язкове для заповнення" >*</span></label><br/>
   <input type="password" name="new_password1"  id="new_password1" placeholder="password" required/>
   <span style="color: grey;">Не менше 8 символів.</span><br/><br/>
   <label style="font-size: 20px;">Повторіть введений пароль<span style="color: red; cursor: default" title="Обов'язкове для заповнення">*</span></label><br/>
   <input type="password" name="new_password2" id="new_password2" placeholder="password" required/><br/><br/>
   
   <span style="font-size: 20px; font-weight: bold; margin-bottom: 15px; margin-top: 30px;">Особиста інформація</span><br/><hr/>
   <label style="font-size: 20px;">Введіть ваше ім'я<span style="color: red; cursor: default" title="Обов'язкове для заповнення">*</span></label><br/>
   <input type="text"  name="name" id="name" style="width:850px;
    height: 30px; margin-bottom: 1px;" required/>
   <span style="color: grey;">Надалі ваше ім'я буде ідентифіковувати вас як користувача.</span><br/><br/>
   
<!--
   <label style="font-size: 20px; ">Ваше прізвище</label><br/>
   <input type="text" name="surname" id="surname"/><br/><br/>
-->
   
   <div id="messageBox"></div>
   <span style="font-size: 22px; font-weight: bold;">Увага!!!</span><br/>
   <span style="color: grey; font-size: 18px;">У разі виникнення проблем з реєстрацією зверніться до адміністратора сайту.</span><br/>
   <input type="submit" name="submit_registration" id="submit_registration" value="Зареєстуватися">
<!--</form>-->

</div><br/><br/>
</div>
</div>


<?php
   
    require($_SERVER['DOCUMENT_ROOT']."/templates/main_content/footer.php");
?>
    


      <?php

    echo "<script>
    
    var block = document.getElementById('block');
    var sub = document.getElementById('submit_registration');
    var regBlock = document.getElementById('form1');
    
    
    block.classList.add('css-block');
    sub.classList.add('css-submit_registration');
    regBlock.classList.add('css-form1'); 
    </script>
     ";
?>      
</html>    
                        
    
      
