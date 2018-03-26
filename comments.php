<!--<form >-->
    <textarea name="comment_content_enter" id="comment_content_enter" style="resize: none;
    margin-left: 20px; border-radius: 5px; border: 1px solid grey; font-size: 18px; font-family: Times New Roman; padding: 10px;" placeholder="Додати коментар ..." required rows="10" cols="95"></textarea>
    <br/>
    <input type="submit" id="comment_submit_style" name="enter" value="Додати"/>
    <input type="reset" id="comment_submit_style2" value="Очистити" onclick="document.getElementById('comment_content_enter').value='';"/>
    
    
    <center><div id="message" style="padding: 25px; font-size: 24px; color: #FF03AF;"></div></center>
<!--</form>-->


<script> 
    $(document).ready(function() {
//         $('#comment_submit_style2').click(function(){
//            $('#comment_content_enter').empty();
//    }); 
        
        $('#comment_submit_style').click(function(){
            $('#message').hide;
            var content = document.getElementById("comment_content_enter").value;
            var id = <?=$news['id'];?>;
                $.ajax({
                    url:'/templates/add_comment.php',
                    type: 'POST',
                    cache: false,
                    data: {id: id,  content: content},
                    dataType: 'html',
                    success: function(data){
                         $('#message').html(data);
                        $('#message').show;
                        if(data == "Ваш коментар успішно опублікований!"){
                            setTimeout(function() {window.location.reload();}, 2500);
                        }
                    }
                });
        });   
        });   
 
</script>
