<?php
 session_start();
include_once("database.php");
include_once('config.php');
    print_r($_SESSION);
    if($_POST){
    
        $username = htmlspecialchars(mysqli_real_escape_string($mysqli,$_POST['name'])); // щоб теги html не  зашкодили даним
    
        $login = htmlspecialchars($_POST['login']);
        $password_old = htmlspecialchars(mysqli_real_escape_string($mysqli,$_POST['password_old']));
        $password_new = htmlspecialchars(mysqli_real_escape_string($mysqli,$_POST['password_new']));
        if($username == get_name($_SESSION['id']) and $login == get_login($_SESSION['id']) and $password_old == "" and $password_new == ""){ 
        header('Location: ../oblik.php');
        exit;   
        }
        
        if($username != get_name($_SESSION['id'])){
            change_name($_SESSION['id'], $username);
        }
        
        if($login != get_login($_SESSION['id'])){
            change_login($_SESSION['id'], $login);
        }
        
        if($password_old != "") {
            if(md5($password_old) != get_password($_SESSION['id'])){
                $_SESSION['msg'] = "Невірно введений існуючий пароль!";
                header('Location: ../oblik.php');
                exit;
            }
            if($password_new == ""){
                $_SESSION['msg'] = "Ви не ввели новий пароль!";
                header('Location: ../oblik.php');
                exit;
            }
            if($password_new < 8){
                $_SESSION['msg'] = "Пароль повинен включати не менше 8 символів!";
                header('Location: ../oblik.php');
                exit;
                
            }else{
                $password = md5($password_new);
               change_password($_SESSION['id'], $password);
//                $mysqli->query("UPDATE `users` SET `password` = $password WHERE `id` = $id "); 
            }
    }
    
    $_SESSION['msg'] = "Зміни успішно збережені!";  
    header('Location: ../oblik.php');
    exit;   
    }
?>