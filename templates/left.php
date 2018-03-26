
<div class="auth_frame"><?php
    //print_r($_SESSION);
    if(isset($_SESSION['username'])){
        
        
//       $avatar = get_avatar($_SESSION['id']);
//        if($avatar == '') 
//            {$avatar = "default.png";}
       
    ?>
<!--
        <img id="avatar_img" src="images/admin/<?=$avatar;?>"  style="position: absolute ;width: 50px; height: 50px; float: left; border: 1px solid #B0C4DE; display: block; background-color: #FFF5EE; border-radius: 100px; margin-left: 15px; margin-top: 10px;"/>
        
       <div style="font-size: 18px; margin-left: 100px;"><?= $_SESSION['username'];?></div> 
        <br/><br/><br/>
-->
      <div style="  margin-left: 55px; color: #FF8A78; font-size: 18px; font-weight: bold;"><?= $_SESSION['username'];?></div>
     
        <img src="images/getnews.png" width="20px" height="20px" style=" margin-left: 20px; margin-top: 13px;">
        <a id="admin_block" href="admin_tools.php">Додати новину</a><br/>
        <img src="images/folder.png" width="20px" height="20px" style="margin-left: 20px; margin-top: 13px;">
        <a id="admin_block" href="oblik.php">Мій обліковий запис</a><br/>
        <img src="images/logout.png" width="23px" height="23px" style=" margin-left: 20px; margin-top: 13px;">
        <a  id="admin_block" href="includes/logout.php">Вийти</a><br/>
        <?php
    }
    else{
        require("templates/authorization.php");
    }
    ?>
</div>


<div class="frame_2"> 

</div>
	
<!--
<div class="frame_3">
    Наш відео-альбом
</div>
-->


<div class="frame_4">
    <p style="text-align: center; font-size: 20px; font-weight: 600; margin-bottom: 3px;">Ми на карті</p>
    <iframe src="https://maps.google.com.ua/maps/ms?aq=f&amp;ie=UTF8&amp;hl=uk&amp;msa=0&amp;msid=200634404030582179636.0004c4012e6e2eb5bfb80&amp;t=h&amp;source=embed&amp;ll=49.04356,24.352849&amp;spn=0.006751,0.01354&amp;z=15&amp;output=embed" width="275" height="290" frameborder="0" style="border:0" allowfullscreen></iframe>
</div><br/> 