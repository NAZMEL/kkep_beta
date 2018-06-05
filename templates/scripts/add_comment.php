<?php
session_start();
include_once("../includes/config.php");
//    $mysqli = new mysqli("localhost", "root", "admin", "kkepit");
//
//    function get_login($id){
//       global $mysqli;
//        $result = $mysqli->query("SELECT `login` FROM `users` WHERE `id` = $id "); 
//        $res = mysqli_fetch_assoc($result); 
//        return $res["login"];
//    }
//
//    function add_comment($id_new, $author, $email, $content){
//        global $mysqli;
//        $res = $mysqli->query("INSERT INTO `comments`( `comment_post_id`, `comment_author`, `comment_author_email`, `content`) VALUES($id_new , '".trim($author)."', '".trim($email)."', '".trim($content)."') ");
//        if($res){
//            return true;
//        }
//        return false;
//    }
//
//    function count_comments($id){
//       global $mysqli ;
//        $result = $mysqli->query("SELECT `comments` FROM `news` WHERE `id` = $id");
//        $result = mysqli_fetch_array($result);
//        $res = $result['comments'];
//     
//        $res++;
//        $mysqli->query("UPDATE `news` SET `comments` =$res WHERE `id` = $id");
//        return $res;
//        
//    }
//
//    function is_comment($id_new, $author){
//         global $mysqli ;
//        $result = $mysqli->query("SELECT `id` FROM `comments` WHERE `comment_post_id` = $id_new AND `comment_author` = '".trim($author)."' ");
//        if($result){
//            $res = mysqli_fetch_assoc($result);
//            if($res['id'])return true;
//            return false;
//            
//        }
//        return false;  
//    }

    $content = htmlspecialchars(mysqli_real_escape_string($mysqli,$_POST['content']));
    $id_new = htmlspecialchars($_POST['id']);
    $author = htmlspecialchars(mysqli_real_escape_string($mysqli,$_SESSION['username']));
    $email = get_login($_SESSION['id']);

    if($content == ""){
        echo "Ви не задали коментар!";
        exit;
    }
    if(is_comment($id_new, $author)){
         echo "Ви вже додали коментар. У вас є можливість редагування.<br/>(не більше одного коментаря під одним записом)";
        exit;
    }
    if(add_comment($id_new, $author, $email, $content)){
        count_comments($id_new); 
        
        echo "Ваш коментар успішно опублікований!";
        exit;
    }
    else{
       
        echo "Виникла помилка. Повторіть спробу! <br/> В разі необхідності зверніться до адміністратора.";
        exit;
    }
?>