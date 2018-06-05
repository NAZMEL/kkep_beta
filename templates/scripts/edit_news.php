<div class="aaa"><img class="edit_news" src="/images/edit_menu.png"/>
<ul class="edit_news2">
<li id="reg_new" name="reg_new"><a href="templates/edit_news2.php?name=reg">Редагувати</a></li>
<li id="del_new" name="del_new"><a href="templates/edit_news2.php?name=del">Видалити</a></li>
</ul></div>

<?php
$_SESSION['new_id'] = $news['id'];
?>
<script>
//     $(document).ready(function(){
//         $('#reg_new').click(function(){
//        var reg=$('#reg_new').val;
//        $.ajax({
//                    url:'/templates/edit_news2.php',
//                    type: 'POST',
//                    cache: false,
//                    data: {reg: reg},
//                    dataType: 'html',
//                    success: function(data){}
//        });
//    });
//         
//         $('#del_new').click(function(){
//        var del=$('#del_new').val;
//        $.ajax({
//                    url:'/templates/edit_news2.php',
//                    type: 'POST',
//                    cache: false,
//                    data: {del: del},
//                    dataType: 'html',
//                    success: function(data){
//                         $('#message').html(data);
//                        $('#message').show;
//                        if(data == "Ваш коментар успішно опублікований!"){
//                            setTimeout(function() {window.location.reload();}, 2500);
//                        }
//                    }
//                });
//    }); 
//     });
</script>
