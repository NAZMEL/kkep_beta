<?php
session_start();
include_once("config.php");

$date_comment = $_SESSION['date_comment'];

if($_GET['name'] == 'edit'){
    $_SESSION['comments_edit_id'] =  get_comment_id($date_comment);
    exit(header("Location: ".$_SERVER['HTTP_REFERER']));
    
}

else if($_GET['name'] == 'delete'){
    if(delete_comment($date_comment)){
        minus_comment($_SESSION['id_news']);
        header("Location: ../artickle.php?id=".$_SESSION['id_news'] );
        exit;
    }
}

else if($_GET['name'] == 'save'){
    //echo $_SESSION['comments_edit_id'];
    comment_change_content($_SESSION['comments_edit_id'], $_POST['comment_content_change']);
    unset($_SESSION['comments_edit_id']);
}
header("Location: ../artickle.php?id=".$_SESSION['id_news'] );
        exit;
?>