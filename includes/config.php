<?php
    require_once "database.php";
function login($login, $password){
    global $mysqli;
     $login = $mysqli->query("SELECT `id`, `username`  FROM `users` WHERE `login` = '".trim(mysqli_real_escape_string($mysqli,$login))."' AND `password` = '".md5(mysqli_real_escape_string($mysqli,$password))."' ");
     $login->close(); 
    if($login){
        $login = mysqli_fetch_array($login);
        if($login["0"]){
            return true;
        }else{
            return false;
        }
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
     $res = mysqli_fetch_assoc($result);
     return $res['avatar'];
    
}

function get_file($id_news){
     global $mysqli;
    $res = $mysqli->query("SELECT  `file` FROM `news` WHERE `id` = $id_news");
   
    if($res){
        $res = mysqli_fetch_assoc($res);
        if($res['file']){
            return $res['file'];
        }
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
    $username = htmlspecialchars(mysqli_real_escape_string($mysqli,$username));
    $res = $mysqli->query("SELECT   `id`  FROM `users`  WHERE `username` = '".trim($username)."' ");
     if($res){
        $res = mysqli_fetch_assoc($res);
        if($res['id']){return $res['id'];}
        else{return false;}
    }
    return $username;
    
}


function get_comment($id_news){
    global $mysqli;
    $res = $mysqli->query("SELECT   `id`, `comment_author`, `comment_author_email`, `content`, `date` FROM `comments` WHERE `comment_post_id` = $id_news ORDER BY `date`");
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
function get_comment_id($date){
    global $mysqli;
    $res = $mysqli->query("SELECT `id` FROM `comments` WHERE `date` = '".trim($date)."' ");
    if($res){
        $res = mysqli_fetch_assoc($res);
        return $res['id'];
    }
    return false;
}
function delete_comment($date){
    global $mysqli;
    $res = $mysqli->query("DELETE FROM `comments` WHERE `date` = '".trim($date)."' ");
    if($res){
        return true;
    }
    return false;
}
function count_comments($id){
       global $mysqli ;
        $result = $mysqli->query("SELECT `comments` FROM `news` WHERE `id` = $id");
        $result = mysqli_fetch_array($result);
        $res = $result['comments'];
     
        $res++;
        $mysqli->query("UPDATE `news` SET `comments` =$res WHERE `id` = $id");
        return $res;
        
    }

function minus_comment($id_new){
    global $mysqli;
    $result = $mysqli->query("SELECT `comments` FROM `news` WHERE `id` = $id_new");
        $result = mysqli_fetch_array($result);
        $result = $result['comments'];
     
        $result--;
        $mysqli->query("UPDATE `news` SET `comments` = $result WHERE `id` = $id_new");
}
function comment_change_content($id_comment, $content_new){
    global $mysqli;
    $res = $mysqli->query("UPDATE `comments` SET `content` = '".trim($content_new)."' WHERE `id` = $id_comment ");
    if($res){
        return true;
    }
    return false;
}
 function add_comment($id_new, $author, $email, $content){
        global $mysqli;
        $res = $mysqli->query("INSERT INTO `comments`( `comment_post_id`, `comment_author`, `comment_author_email`, `content`) VALUES($id_new , '".trim($author)."', '".trim($email)."', '".trim($content)."') ");
        if($res){
            return true;
        }
//        return false;
     return false;
    }

function is_comment($id_new, $author){
         global $mysqli ;
        $result = $mysqli->query("SELECT `id` FROM `comments` WHERE `comment_post_id` = $id_new AND `comment_author` = '".trim($author)."' ");
        if($result){
            $res = mysqli_fetch_assoc($result);
            if($res['id'])return true;
            return false;       
        }
        return false;  
    }

function is_module($id_user){
   global $mysqli;
    $mysqli = new mysqli("localhost", "root", "admin", "kkepit");
    $result = $mysqli->query("SELECT * FROM `users` WHERE `id` = $id_user ");
    if($result){
        $res = mysqli_fetch_assoc($result);
        if($res['module']){return true;}
        return false;
    }
    return false;
}



function get_more_image($id_news){
    global $mysqli;
    $result= $mysqli->query("SELECT `more_image` FROM `news` WHERE `id` = $id_news ");
    if($result){
        $res = mysqli_fetch_assoc($result);
        if($res['more_image']){
            $list= unserialize($res['more_image']);
            return $list;
        }
        return false;
    }
    return false;
}

function get_reg_new($id_new){
    global $mysqli;
    $arr=[];
    $res =  $mysqli->query("SELECT `title`, `full_text` FROM     `news` WHERE `id` = $id_new");
    if($res){
        $result = mysqli_fetch_assoc($res);
        if(!isset($result['full_text'])){
            $result['full_text'] = "";
        }
        if($result['title'] && ($result['full_text'] or $result['full_text'] == "")){
            $arr['title']= $result['title'];
            $arr['full_text']= $result['full_text'];
            return $arr;
        }
        else{
            return false;
        }
    }
    return false;
}

function change_news_content($id_new, $title, $text){
    global $mysqli;
    $title2 = mysqli_real_escape_string($mysqli, $title);
    $content = mysqli_real_escape_string($mysqli, $text);

    $res = $mysqli->query("UPDATE `news` SET `title` = '".trim($title2)."' ,  `full_text` = '".trim($content)."' WHERE `id` = $id_new");
    if($res){
        return true;
    }
    return false;
}

function get_files($id_news){
     global $mysqli;
    $result= $mysqli->query("SELECT `file` FROM `news` WHERE `id` = $id_news ");
    if($result){
        $res = mysqli_fetch_assoc($result);
        if($res['file']){
            $list= unserialize($res['file']);
            return $list;
        }
        return false;
    }
    return false;
}
function delete_video($video){
    global $mysqli;
    $res = $mysqli->query("DELETE  FROM `news` WHERE `video` = '".trim($video)."' ");
    if($res){
        return true;
    }
    return false;
}

function delete_new($id_new){
     global $mysqli;
    $res = $mysqli->query("SELECT * FROM `news` WHERE `id` = $id_new ");
    if($res){
        $res = mysqli_fetch_assoc($res);
        if(isset($res['image'])){
            $img = $res['image'];
            if(unlink("../news/images/$img")){}
        }
        if(isset($res['more_image'])){
            $img_more = get_more_image($id_new);
            if($img_more){
                for($i =0; $i<count($img_more); $i++){
                    $im = $img_more[$i];
                     if(unlink("../news/images/$im")){}
                }
            }
        }
        
        if(isset($res['file'])){
            $files = get_files($id_new);
            if($files){
                for($i = 0; $i < count($files); $i++){
                    $file = $files[$i];
                    if(unlink("../news/files/$file")){}
                }
            }
        }
        
        if(isset($res['video'])){
            $video = $res['video'];
            if(unlink("../news/videoes/$video")){}
            
        }
        
    }
    $res2 = $mysqli->query("DELETE FROM `news` WHERE `id` = $id_new ");
    if($res2){
        return true;
    }
    return false;
}

//function set_news($title, $full_text, $username){
function set_news($post, $username, $avatar_name,$image_more, $file_name, $video_name){
    global $mysqli;
    
   
    $title = mysqli_real_escape_string($mysqli,$post['title']);
    $full_text = $post['full_text'];
    $url = mysqli_real_escape_string($mysqli,$post['url']);
    $youtube = mysqli_real_escape_string($mysqli,$post['youtube']);
    

//    $file=$FILE['file'];
    
    
    
    $list1 = "`author`, `title`, ";
    $value = "'".trim(mysqli_real_escape_string($mysqli,$username))."', '".trim(mysqli_real_escape_string($mysqli,$title))."', ";
    if($full_text != ""){
        $list1 .= "`full_text`, ";
        $value .= "'".trim(mysqli_real_escape_string($mysqli, $full_text))."', ";
    }
   
    if($avatar_name != ""){
       
        $list1 .= "`image`, ";
        $value .= "'".trim(mysqli_real_escape_string($mysqli,$avatar_name))."', ";
    }
    
    if(!empty($image_more)){
        $list1 .= "`more_image`, ";
        $list = "";
    $list= serialize($image_more);
        $value .="'".trim(mysqli_real_escape_string($mysqli,$list))."', ";
    }
    if($url != "")
    {
        $list1 .= "`url`, ";
        $value .= "'".trim($url)."', ";
    }
    if($youtube != ""){
        $youtube = "https://www.youtube.com/embed/" . substr($youtube, strlen("https://www.youtube.com/watch?v="));
        $list1 .= "`youtube`, ";
        $value .= "'".trim(mysqli_real_escape_string($mysqli,$youtube))."',  ";
    }
    
    if(!empty($file_name)){
        $list1 .= "`file`, ";
       $arr = serialize($file_name);
        $value .= "'".trim(mysqli_real_escape_string($mysqli,$arr))."',  ";
    }
    
    if($video_name != ""){
        $list1 .= "`video`, ";
        $value .= "'".trim($video_name)."', ";
    }
    
    $list1 .= "`viewes`, `likes`, `comments`";
    $value .= "0, 0,0";
//    print_r($list);
//    print_r($value);
//    if($res = $mysqli->query("INSERT INTO `news`(`author`, `title`, `full_text`, `viewes`, `likes`, `comments`, `intro_text`) VALUES('".trim($username)."', '".trim($title)."', '".trim($full_text)."', 0, 0,0, '".trim($intro_text)."')")){
//        return true;
//    }
//print_r($list1);
//print_r($value);
    if($res = $mysqli->query("INSERT INTO `news`(${list1} ) VALUES(${value})")){
        return true;
    }
    else{
        echo $mysqli->error;
        return false;
    }
    
    
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
        global $mysqli;
//        if($limit < 15){
//            $limit = $mysqli->query("SELECT count(*) AS count_news FROM `news`");
//            if($limit){
//                $lim = mysqli_fetch_assoc($mysqli);
//                if($lim['countnews'] > 1){
//                    $limit = $lim['countnews'];
//                }
//                else{
//                    $limit = 1;
//                }
//            }
//            else{
//                $limit = 1;
//            }
//        }
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
function is_like($id_user, $id_news){
    global $mysqli;
     
    $res = $mysqli->query("SELECT `id` FROM `likes` WHERE `id_news` =  $id_news AND `id_user` = $id_user");
    if($res){
        $result = mysqli_fetch_assoc($res);
        if($result['id'])return true;
    }
    return false;
}
function set_like($id_user, $id_news){
    global $mysqli;
    $res = $mysqli->query("INSERT INTO `likes` (`id_news` , `id_user`) VALUES($id_news,$id_user)");
    $res_new = $mysqli->query("UPDATE `news` SET `likes` = `likes` + 1 WHERE `id` = $id_news");
      $like = $mysqli->query("SELECT `likes` FROM `news` WHERE `id` = $id_news");
    $like = mysqli_fetch_assoc($like);
    if($res){
        return true;
    }
    return false;
}

function minus_like( $id_user, $id_news){
    global $mysqli;
    $res = $mysqli->query("DELETE FROM `likes` WHERE `id_news` = $id_news AND `id_user` = $id_user ");
    if($res){
        $res_new1 = $mysqli->query("SELECT  `likes` FROM `news` WHERE `id` = $id_news");
        $res_new1 = mysqli_fetch_assoc($res_new1);
        $like = $res_new1['likes'];
        $like--;
        $res_new = $mysqli->query("UPDATE `news` SET `likes` = $like WHERE `id` = $id_news");
        return true;
    }
    return false;
}

function get_likes($id_news){
   global $mysqli;
    $res = $mysqli->query("SELECT `likes` FROM `news` WHERE `id` = $id_news");
    if($res){
        $res = mysqli_fetch_assoc($res);
        if($res['likes'])return $res['likes'];
    }
    return false;  
}
function search_artickles($words){
    global $mysqli;
//    $mysqli = new mysqli("localhost", "root", "admin", "kkepit");
    $tmp = [];
    $res = $mysqli->query("SELECT * FROM `news` WHERE `full_text` LIKE '%$words%' OR `title` LIKE '%$words%'");
    if($res){
        while($result= mysqli_fetch_assoc($res)){
            $tmp[] = $result;
        }
        $res->close();
        return $tmp;
    }
    $res->close();
    return false;
    
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