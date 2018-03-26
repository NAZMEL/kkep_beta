<?php
session_start();
require_once("../includes/config.php");
if($_GET['name'] == 'del'){
   delete_new($_SESSION['new_id']);
   unset($_SESSION['new_id']);
    exit(header("Location: ../index.php"));
}

if($_GET['name'] == 'reg'){
    $id = $_SESSION['new_id'];
    unset($_SESSION['new_id']);
    exit(header("Location: ../edit_text_new.php?id_new=$id"));
    
}
unset($_SESSION['new_id']);
    exit(header("Location: ../index.php"));
?>