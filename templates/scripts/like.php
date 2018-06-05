           <?php
            if(isset($_SESSION['id'])){
            if(is_like($_SESSION['id'], $news['id'])){  
                $tmp ="/images/like2.png";
            } else { 
                $tmp ="/images/like1.png";
            }}
            else{
                $tmp ="/images/like1.png";
            }?>
             <span  title="Сподобалось" style="position: absolute; margin-left: 750px; font-size: 20px;"><img id="like" src="<?= $tmp ?>" alt="Вподобали" style="width: 20px; height: 20px;" >&nbsp<span id="count_likes"><?= $news['likes'];?></span></span>
 
<script>
     var count_like = <?= $news['likes'] ?>;
           $(document).ready(function(){
               $('#like').click(function(){
        
            
            var id_new = <?php echo $news['id']?>;
            var id_user = <?php echo $_SESSION['id']?>;
             


                   $.post('/templates/scripts/likes.php', {like: count_like, id_new: id_new, id_user: id_user}, function(data){
                       data = JSON.parse(data);
                       $('#count_likes').html(data['like']);
                       $('#like').attr("src",data['src'] );
                   })
                   
                   
 
      });                                 
    });

</script>
