<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/templates/includes/data_DB.php");

    $mysqli = new mysqli($HOST, $ROOT, $PASSWORD, $DATABASE); //підключитись до бази даних

    if(mysqli_connect_errno())//якщо відбудеться підключення, то повернеться номер помилки, якщо підключення не відбудеться - поверне 0 і if не виконається
    {
        echo "Помилка підключення до бази даних ('".mysqli_connect_errno()./*№ помилки*/"') : ".mysqli_connect_error()/* опис помилки*/;
        exit();
    }

    function closeDB(){
        global $mysqli;
        $mysqli->close();
    }
    
?>