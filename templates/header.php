<?php
    require_once("includes/database.php");
?>


<!DOCTYPE html>
<html lang="uk-ua">

<head>
	<meta charset="UTF-8"/>                                                                                <!-- Кодування -->
	<title><?= $title ?></title>
	<link rel="icon" href="images/gerb_5.jpg" type="images/x-icon" >                                         <!-- Іконка -->                                     
	<link rel="stylesheet" type="text/css" href="templates/style/main.css" media="all">
   
    <script type="text/javascript" src="templates/scripts/script.js"></script>
    <script type="text/javascript" src="templates/jquery/jquery-3.2.1.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="templates/main_images/demoStyleSheet.css" />
<!--<script type="text/javascript" src="jquery.js"></script>-->
<script type="text/javascript" src="templates/main_images/fadeSlideShow.js"></script>

<script  type="text/javascript" href="../highslide/highslide.js" ></script>
<script type="text/javascript" src="../highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="../highslide/highslide.css" />   
    
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('#slideshow').fadeSlideShow();
});
</script>
    
    <script type="text/javascript">
hs.graphicsDir = '../highslide/graphics/';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.outlineType = 'rounded-white';
hs.fadeInOut = true;
hs.numberPosition = 'caption';
hs.dimmingOpacity = 0.75;

// Add the controlbar
if (hs.addSlideshow) hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 5000,
	repeat: false,
	useControls: true,
	fixedControls: 'fit',
	overlayOptions: {
		opacity: .75,
		position: 'bottom center',
		hideOnMouseOut: true
	}
});
</script> 

</head>


<!--<body onload="timer()">-->
 <body>

     <div id="grey_content"></div>                                                                            <!-- Фон сайту при збільшенні зображень -->

    <div id="soc_net">
        <a href="https://www.facebook.com/admin.kkepit.nung?fref=ts" target="_blank"><img src="images/facebook.png"  id="soc"></a><br/>
        <a href="https://vk.com/kkepit_nung" target="_blank"><img src="images/vk.png" id="soc"></a><br/>       
        <a><img src="images/ok.png" id="soc"></a><br/>
        <a><img src="images/instagram.png" id="soc"></a><br/>        
    </div>

    
<div id="div_icon">
    <div id="img_gerb"><img  src="images/gerb_51.png" alt="gerb" width="115px" height="115px" ></div>	
    <div id="kkepit">Калуський коледж економіки, права та інформаційних технологій</div>
    <br/><span style="font-size: 20px; margin-left:130px; font-weight: 600; position: static;">ІВАНО-ФРАНКІВСЬКОГО НАЦІОНАЛЬНОГО ТЕХНІЧНОГО УНІВЕРСИТЕТУ НАФТИ І ГАЗУ</span>
</div>