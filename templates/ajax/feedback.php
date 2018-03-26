<?php
$mysqli = new mysqli("localhost", "root", "admin", "kkepit"); //підключитись до бази даних

    $name = htmlspecialchars(mysqli_real_escape_string($mysqli,$_POST['name'])); // щоб теги html не  зашкодили даним
//    $surname = htmlspecialchars(mysqli_real_escape_string($mysqli,$_POST['surname']));
    $login = htmlspecialchars(mysqli_real_escape_string($mysqli,$_POST['login']));
    $password = htmlspecialchars(mysqli_real_escape_string($mysqli,$_POST['password']));

   
   $unique = $mysqli->query("SELECT count(`login`) AS 'count' FROM `users` WHERE `login` = '".$login."' ");
   $count = mysqli_fetch_array($unique);
    if($count['count'] > 0)
    {
        echo "Користувач із даною електронною поштою вже існує!";
        exit;
    }
   
//    if($surname != ''){
//        $mysqli->query("INSERT INTO `users` (`username`, `surname`, `login`, `password` , `reg_date`) VALUES ('".$name."', '".$surname."' , '".$login."', '".md5($password)."', CURRENT_TIMESTAMP)");
//    }     
//    else{
        $mysqli->query("INSERT INTO `users` (`username`, `login`, `password` , `reg_date`) VALUES ('".$name."', '".$login."', '".md5($password)."', CURRENT_TIMESTAMP)");
//    }

    echo "Вас зареєстровано!!!<br/>Перейдіть на головну сторінку для авторизації.";
    
    $mysqli->close();
    //header("Location: ../index.php"); 


//    $subject = "=?utf-8?B?".base64_encode("Hello")."?=";
//    $message = "Ви успішно зареєстровані!";
//    $headers = "MIME-Version: 1.0" . PHP_EOL .
//                "Content-type: text/html;
//                charset= utf-8\r\n".PHP_EOL.
//                "From: melnyknasar@gmail.com\r\n ". PHP-EOL ."
//                Reply-to: melnyknasar@gmail.com\r\n
//                ";
//
//    if(mail("melnyknasar@gmail.com", $subject, $message, $headers)){
//        echo "Повідомлення відправлено!";
//    }
//    else{
//        echo "Повідомлення не відправлено!";
//    }
  

        
?>
