<?php 
session_start();
include("../includes/config.php");
    if(empty($_POST["login"]) && empty($_POST["paswrd"]))
    {
        header('Location:/');
    }
    $mysqli = new mysqli("localhost", "root", "admin", "kkepit");
    
    $login = $mysqli->query("SELECT `id`, `username`  FROM `users` WHERE `login` = '".trim(mysqli_real_escape_string($mysqli,$_POST["login"]))."' AND `password` = '".md5(mysqli_real_escape_string($mysqli,$_POST["paswrd"]))."' ");

    $login = mysqli_fetch_array($login);
  
    $mysqli->close(); 
//    if($login["0"])



//$login = login($_POST["login"], $_POST["paswrd"]);
//if($login){
//        $_SESSION['id'] = $login['id'];
//        $_SESSION['username'] = $login['username'];
//        session_name ($login['username'] );
//        //$_SESSION['login'] = $login['login']; 
//        echo "Ви увійшли";
//        header("Location: index.php");
//        exit;
//    }
//    else{
//         echo "Такого користувача не існує! Будь ласка, перейдіть на сторінку реєстрації.";
//        sleep(2);      
//    }


if($login['0']){
        $_SESSION['id'] = $login['id'];
        $_SESSION['username'] = $login['username'];
        session_name ($login['username'] );
        //$_SESSION['login'] = $login['login']; 
        $_SESSION['message'] =  "Ви увійшли";
        exit(header("Location: /"));
        
    }
    else{
         $_SESSION['message'] = "Такого користувача не існує! Будь ласка, перейдіть на сторінку реєстрації.";
         header("Location: /");
        exit;      
    }
    
?>  
