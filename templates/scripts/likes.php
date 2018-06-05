<?php
session_start();
include_once("../includes/config.php");
//print_r($_POST);
$arr_like=[];
$like=$_POST['like'];
$id_new= $_POST['id_new'];
$id_user = $_POST['id_user'];
if(isset($_SESSION['id'])){
    if(!(is_like($id_user, $id_new))){
        set_like($id_user, $id_new);
        $arr_like['like'] = get_likes($id_new);
        $arr_like['src'] = "images/like2.png";
    }
    else{
        minus_like($id_user, $id_new);
        if(!get_likes($id_new)){
            $arr_like['like'] = 0;
        }else{
             $arr_like['like'] = get_likes($id_new);
        }
        $arr_like['src'] = "images/like1.png";  
    }
}
echo(json_encode($arr_like));        
?>


 