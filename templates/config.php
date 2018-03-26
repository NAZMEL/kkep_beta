<?php
    require_once "database.php";
function is_module($id_user){
   global $mysqli;
    $result = $mysqli->query("SELECT `module` FROM `users` WHERE `id` = $id_user ");
    if($result){
        $res = mysqli_fetch_assoc($result);
        if($res['module']){return true;}
        return false;
    }
    return false;
 
}
function get_name($id){
   global $mysqli;
    $result = $mysqli->query("SELECT `username` FROM `users` WHERE `id` = $id "); 
    $res = mysqli_fetch_assoc($result);
    return $res['username'];
}
 function change_name($id, $username){
     global $mysqli;
     $mysqli->query("UPDATE  `users` SET `username`  = '".trim($username)."'  WHERE `id` = $id "); 
 }
function get_login($id){
   global $mysqli;
    $result = $mysqli->query("SELECT `login` FROM `users` WHERE `id` = $id "); 
    $res = mysqli_fetch_assoc($result); 
    return $res["login"];
}

function change_login($id, $login){
    global $mysqli;
     $mysqli->query("UPDATE  `users` SET `login`  = '".trim($login)."'  WHERE `id` = $id ");
}

function get_password($id){
   global $mysqli;
    $result = $mysqli->query("SELECT `password` FROM `users` WHERE `id` = $id "); 
    $res = mysqli_fetch_assoc($result); 
    return $res["password"];
}

function change_password($id, $password_new){
      global $mysqli;
     $mysqli->query("UPDATE  `users` SET `password`  = '".trim($password_new)."'  WHERE `id` = $id "); 
}

function set_avatar($id,  $avatar_name){
    global $mysqli;
    $mysqli->query("UPDATE `users` SET `avatar` = '".trim($avatar_name)."' WHERE `id` = $id ");
    
   
}

function get_avatar($id){
    global $mysqli;
    
     $result = $mysqli->query("SELECT `avatar` FROM `users` WHERE `id` = $id"); 
    if($result){
        $res = mysqli_fetch_assoc($result);
        if($res['avatar']){return $res['avatar'];}
        else{
            return false;
        }
    }
    return false;
    
}

function get_video_news($id_news){
    global $mysqli;
    $res = $mysqli->query("SELECT  `video` FROM `news` WHERE `id` = $id_news");
   
    if($res){
        $res = mysqli_fetch_assoc($res);
        if($res['video']){
            return $res['video'];
        }
        else{
            return false;
        }
    }
    return false;
}

function add_comment($id_new, $author, $content){
    
}

//кількість коментарів у таблиці для даної новини
function count_comment_new($id_news){
    global $mysqli;
    $res = $mysqli->query("SELECT  count(*) AS count_comment FROM `comments` WHERE `comment_post_id` = $id_news");
    if($res){
        $res = mysqli_fetch_assoc($res);
        if($res['count_comment']){return $res['count_comment'];}
        else{return false;}
    }
    return false;
}

function get_id_author($username){
    global $mysqli;
    $mysqli = new mysqli("localhost", "root", "admin", "kkepit");
    $res = $mysqli->query("SELECT   `id`  FROM `users`  WHERE `username` = '".trim(mysqli_real_escape_string($mysqli,$username))."' ");
     if($res){
        $res = mysqli_fetch_assoc($res);
        if($res['id']){return $res['id'];}
        else{return false;}
    }
    return $username;
    
}


function get_comment($id_news){
    global $mysqli;
    $res = $mysqli->query("SELECT   `comment_author`, `comment_author_email`, `content`, `date` FROM `comments` WHERE `comment_post_id` = $id_news ORDER BY `date`");
    $array = [];
    if($res){
        while(($result = mysqli_fetch_assoc($res)) != false)
        {
            $array[] = $result;
        }
        return $array;
    }
    return false;
}

//function set_news($title, $full_text, $username){
function set_news($post, $username, $avatar_name, $file_name, $video_name){
    global $mysqli;
    
   
    $title = $post['title'];
    $full_text = $post['full_text'];
    $url = $post['url'];
    $youtube = $post['youtube'];
    

//    $file=$FILE['file'];
    
    $intro_text = "kfjgifkg";
    
    $list = "`author`, `title`, ";
    $value = "'".trim($username)."', '".trim($title)."', ";
    if($full_text != ""){
        $list .= "`full_text`, ";
        $value .= "'".trim($full_text)."', ";
    }
   
    if($avatar_name != "" and $avatar_name != 1){
       
        $list .= "`image`, ";
        $value .= "'".trim($avatar_name)."', ";
    }
    if($url != "")
    {
        $list .= "`url`, ";
        $value .= "'".trim($url)."', ";
    }
    if($youtube != ""){
        $youtube = "https://www.youtube.com/embed/" . substr($youtube, strlen("https://www.youtube.com/watch?v="));
        $list .= "`youtube`, ";
        $value .= "'".trim($youtube)."',  ";
    }
    
    if($file_name != ""){
        $list .= "`file`, ";
        $value .= "'".trim($file_name)."',  ";
    }
    
    if($video_name != ""){
        $list .= "`video`, ";
        $value .= "'".trim($video_name)."', ";
    }
    
    $list .= "`viewes`, `likes`, `comments`, `intro_text`";
    $value .= "0, 0,0, '".trim($intro_text)."'";
//    print_r($list);
//    print_r($value);
//    if($res = $mysqli->query("INSERT INTO `news`(`author`, `title`, `full_text`, `viewes`, `likes`, `comments`, `intro_text`) VALUES('".trim($username)."', '".trim($title)."', '".trim($full_text)."', 0, 0,0, '".trim($intro_text)."')")){
//        return true;
//    }
print_r($list);
print_r($value);
    if($res = $mysqli->query("INSERT INTO `news`($list ) VALUES($value )")){
        return true;
    }
    else{
        return false;
    }  
}

function delete_new($id_new){
    global $mysqli;
     $mysqli = new mysqli("localhost", "root", "admin", "kkepit");
    $res = $mysqli->query("DELETE FROM `news` WHERE `id` = $id");
    if($res){return true;}
    return false;
}


function get_youtube($id_new){
    global $mysqli;
    $mysqli = new mysqli("localhost", "root", "admin", "kkepit");
    $res = $mysqli->query("SELECT  `youtube` FROM `news` WHERE `id` = $id_new");
   
    if($res){
        $res = mysqli_fetch_assoc($res);
    if($res['youtube']){
        return $res['youtube'];
    }
    else{
        return false;
    }
    }
    return false;
}

function get_image_news($id_news){
    global $mysqli;
    $mysqli = new mysqli("localhost", "root", "admin", "kkepit");
    $res = $mysqli->query("SELECT  `image` FROM `news` WHERE `id` = $id_news");
   
    if($res){
        $res = mysqli_fetch_assoc($res);
        if($res['image']){
            return $res['image'];
        }
        else{
            return false;
        }
    }
    return false;
}







//кількість записів які ми будемо витягувати з бази даних на сторінку
    function getStart($page, $limit){
        return $limit * ($page - 1);
        /*limit = 15
           page = 1
           15 * 1 - 1 = 15 * 0 = 0
           тоді в getNews() в result вибирати почнемо з 1 запису
           */
    }

    function getNews($start, $limit){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM `news` ORDER BY `id` DESC LIMIT $start, $limit  ");
        $array = array();
        while(($row = mysqli_fetch_array($result)) != false)
        {
            //print_r($row);
            $array[] = $row;
        }
            
            //$row = mysqli_fetch_array($result);
        closeDB();
        return $array;   
    }

    function getNew($id){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM `news` WHERE `id` = $id");
        $row = mysqli_fetch_array($result);    
        //print_r($row);
        closeDB();
        return $row;   
        
    }
    
    //count news
    function countArtickles(){
        $mysqli = new mysqli("localhost", "root", "admin", "kkepit");
        $result = $mysqli->query("SELECT count(`id`) AS count_id FROM `news`");
        
        $result = mysqli_fetch_row($result);// Array([0] => 5)
        
        return $result[0];
    }

    //count pages
    function count_pages($count_news, $limit){
        if($count_news<$limit){
            return false;
        }
        $number_pages = (int)($count_news/$limit);
        //як що кількість сторінок є дійсне числом (15,2)
        if($count_news%$limit != 0){
            $number_pages++;
        }
        return $number_pages;
    }

  
    function count_views($id){
       $mysqli = new mysqli("localhost", "root", "admin", "kkepit");
        $result = $mysqli->query("SELECT `viewes` FROM `news` WHERE `id` = $id");
        $result = mysqli_fetch_array($result);
        $res = $result['viewes'];
     
        $res++;
        $mysqli->query("UPDATE `news` SET `viewes` =$res WHERE `id` = $id");
        return $res;
        
    }








    function pagination($page, $limit){
        $count_artickles = countArtickles();
        $count_pages = ceil($count_artickles);
        
        if($page > $count_pages)
        {
            $page = $count_pages;
        }
        
        $prev = $page-1;
        $next = $page + 1;
        if($prev < 1){
            $prev = 1;
        }
        if($next > $count_pages){
            $next = $count_pages;
        }
        $pagination = "";
        
        if($count_pages > 1){
//            if($page==1){
//                $pagination .= "<span>Перша</span>";
//                $pagination .= "<span> Попередня</span>";
//            }
//            else{
                $pagination .= "<a href='index.php'></a>";
                if($prev == 1){
                    $pagination .= "<a href='index.php'> Попередня</a>";
                }
                else{
                    $pagination = "<a href = 'index.php?page= $page'> Попередня </a>";
                }
            }
            
            for($i = 0; $i < $count_pages; $i++){
                if($i == 1){
                    $pagination .= "<a href='index.php'> ".$i."</a>";
                }
                elseif($i == $page){
                    $pagination .= "<span>".$i."</span>";
                }
                else{
                    $pagination .= "<a href = 'index.php?page=".$i."' </a>";
                }
            }
            
            if($page == $count_pages){
                $pagination .= "<span>Next</span>";
                $pagination .= "<span>".$count_pages."<span>";
            }
            else{
                $pagination .= "<a href='index.php?page=".$next."'>Next</a>";
                $pagination .= "<a href='index.php?page =".$count_pages."'>".$count_pages."</a>";
            }
//        } 
        return $pagination;
    }

?>