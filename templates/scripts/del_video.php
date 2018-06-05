<?php
session_start();
require_once("../includes/config.php");

$tmp = substr($_GET['name'], strlen("del_"));
if(unlink("../news/videoes/$tmp")){
    if(delete_video($tmp)){};
    exit(header("Location: ../video_gallery.php"));
}

?>