<?php
session_start();

include_once "database.php";
include_once "config.php";
  if((! isset($_FILES) || (count($_FILES) == 0))){

      $_SESSION['msg'] = "Розмір переданих файлів перевищує допустимий (8388606 байт).";
        header('Location: ../admin_tools.php');
        exit;
 }

$username = get_name($_SESSION['id']);
$_SESSION['msg'] = $username;
$user_id = $_SESSION['id'];
$video_name = "";
if($_FILES['video']['name'] != ""){
    if(!empty($_FILES['video']['error'])){
        if($_FILES['video']['error'] == 1){
          $_SESSION['msg'] = "Розмір файла перевищує 2000Мб";
        header('Location: ../admin_tools.php');
        exit;  
        }
        $_SESSION['msg'] = "Помилка загрузки відеофайла! Повторіть спробу!";
        header('Location: ../admin_tools.php');
        exit;
    }
   
    $video_name = md5($_FILES['video']['name']).".".substr($_FILES['video']['type'], strlen("video/"));
    $upload_video = "../news/videoes/".$video_name;
    if(!move_uploaded_file($_FILES['video']['tmp_name'],  $upload_video)){
            $_SESSION['msg'] = "Відеофайл не вдалося загрузити!";
            header('Location: ../admin_tools.php');
            exit;   
}
}

if($_POST['title'] == ""){
    $_SESSION['msg'] = "Назва публікації обов'язкова!";
    
    header('Location: ../admin_tools.php');
    exit;
}
$title = $_POST['title'];

if($_POST['full_text']){
    $full_text = htmlspecialchars($_POST['full_text']);
}

$arr_names = "";
if($_FILES['image_more']['name'][0] != ""){
    $total = count($_FILES['image_more']['name']);
    $arr_names=[];
    for($i=0; $i < $total; $i++){
        
            switch($_FILES["image_more"]["type"][$i]){
        case 'image/jpeg' :
        case 'image/pjpeg':
            $type= '.jpg';break;

        case 'image/png':
        case 'image/x-png':
            $type='png';break;
        case 'image/gif':
            $type = '.gif';
            break;
         case 'image/bmp' :
            $type = '.bmp';
            break;
        default: 
            $_SESSION['msg'] = "Формат зображень повинен бути одним із нижче перелічених: jpeg, pjpeg, png, x-png, gif";
            header('Location: ../admin_tools.php');
            exit;   
    }
        $avatar_type1 = $_FILES['image_more']['type'][$i];
        $tmp_file_path = $_FILES['image_more']['tmp_name'][$i];
        if($tmp_file_path != ""){
            $newFilePath= "../news/images/".md5($_FILES['image_more']['name'][$i]).".".substr($avatar_type1, strlen("image/"));
            if(move_uploaded_file($tmp_file_path, $newFilePath)){
//                print_r($_FILES['image_more']['name'][$i]);
                $arr_names[] = md5($_FILES['image_more']['name'][$i]).".".substr($avatar_type1, strlen("image/"));;
            }
        }
    }
    if(!empty($arr_names)){
        for($i=0; $i<count($arr_names); $i++){
            echo $arr_names[$i].'<br/>';
        }
//        set_more_image($arr_names);
//        $list= serialize($arr_names);
//    echo $list;
//        echo"<br/>";
//        $a = unserialize($list);
//        print_r($a);
    }
}




$avatar_name = "";
if($_FILES['image']['name'] != ""){
    
if(!empty($_FILES['image']['error'])){
    $_SESSION['msg'] = "Помилка загрузки зображення!";
    header('Location: ../admin_tools.php');
    exit;
}

switch($_FILES["image"]["type"]){
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
        $_SESSION['msg'] = "Формат файлу повинен бути одним із нижче перелічених: jpeg, pjpeg, png, x-png, gif";
        header('Location: ../admin_tools.php');
        exit;   
}
$id = $_SESSION['id'];
$username = $_SESSION['username'];
  
$avatar_name = $_FILES['image']['name'];
$avatar_type = $_FILES['image']['type'];
$uploaddir = "../news/images/";
$login = $_POST['title'];

$avatar_name = md5($login) . "." . substr($avatar_type, strlen("image/"));
$uploadfile = $uploaddir.$avatar_name;
if(move_uploaded_file($_FILES['image']['tmp_name'],  $uploadfile)){
//    $_SESSION['msg']="Зображення успішно загружено!";
//    header('Location: ../admin_tools.php');
//    exit;   
} 
else{
    $_SESSION['msg'] = "Зображення не вдалося загрузити!";
        header('Location: ../admin_tools.php');
        exit;   
}
}

$arr_files = "";
if($_FILES['file']['name'][0] != ""){
    $total_files = count($_FILES['file']['name']);
    $arr_files=[];
    for($i=0; $i < $total_files; $i++){
         $tmp_file_path2 = $_FILES['file']['tmp_name'][$i];
        if($tmp_file_path2 != ""){
            $newFilePath2= "../news/files/".$_FILES['file']['name'][$i];
            if(move_uploaded_file($tmp_file_path2, $newFilePath2)){
//                print_r($_FILES['image_more']['name'][$i]);
                $arr_files[] = $_FILES['file']['name'][$i];
            }
            else{
                 $_SESSION['msg'] = "Виникла помилка при загрузці файлів.";
            header('Location: ../admin_tools.php');
            exit;  
            }
        }
        
    }
    

//    $file_name = $_FILES['file']['name'];
//    $uploadfiles = "../news/files/".$file_name;
//    if(!move_uploaded_file($_FILES['file']['tmp_name'],  $uploadfiles)){
//            $_SESSION['msg'] = "Файл не вдалося загрузити!";
//            header('Location: ../admin_tools.php');
//            exit;   
//}

}

       
if(set_news($_POST, $username, $avatar_name, $arr_names, $arr_files, $video_name)){
    $_SESSION['msg'] = "Вашу новину успішно опубліковано!";
    header('Location: ../admin_tools.php');
    exit;
}else{
    $_SESSION['msg'] = "Помилка публікації!";
    
//    header('Location: ../admin_tools.php');
//    exit;

}

?>