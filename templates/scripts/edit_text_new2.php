<?php
session_start();
include_once("../includes/config.php");

$id_new = $_POST['id_new'];
$title = $_POST['title'];
$text = $_POST['text'];
if(change_news_content($id_new, $title, $text))
{
    echo "Вашу новину успішно оновлено!";
}
else{
    echo "Виникли деякі проблеми. Спробуйте знову!";
}
?>
