<?php
session_start();

include_once "includes/database.php";
include_once "includes/config.php";
 

//print_r($_FILES["ava"]);
if(!empty($_FILES['ava']['error'])){
    $_SESSION['msg'] = "Помилка загрузки зображення!";
    header('Location: ../oblik.php');
    exit;
}

switch($_FILES["ava"]["type"]){
    case 'image/jpeg' :
    case 'image/pjpeg':
        $type= 'jpg';break;
        
    case 'image/png':
    case 'image/x-png':
        $type='png';break;
    case 'image/gif':
        $type = 'gif';
        break;
    
    default: 
        $_SESSION['msg'] = "Формат файлу повинен бути одним із нижче перелічених: <br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp jpeg, pjpeg, png, x-png, gif ";
        header('Location: ../oblik.php');
        exit;   
}
$id = $_SESSION['id'];
$username = $_SESSION['username'];
  
$avatar_name = mysqli_real_escape_string($mysqli,$_FILES['ava']['name']);
$avatar_type = $_FILES['ava']['type'];
$uploaddir = "images/admin/";
$login = get_login($id);

$avatar_name = $login . "." . substr($avatar_type, strlen("image/"));
    
    $uploadfile = $uploaddir.$avatar_name;
if(move_uploaded_file($_FILES['ava']['tmp_name'],  $uploadfile)){
    set_avatar($id, $avatar_name);
    $_SESSION['msg']="Зображення успішно загружено!";
    header('Location: ../oblik.php');
    exit;   
}
   
else{
    $_SESSION['msg'] = "Зображення не вдалося загрузити!";
        header('Location: ../oblik.php');
        exit;   
}
?>