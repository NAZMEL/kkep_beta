<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/templates/includes/database.php");
    $title = "ККЕПІТ ІФНТУНГ";
    include_once($_SERVER['DOCUMENT_ROOT']."/templates/main_content/header.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/templates/includes/config.php"); 
    include_once($_SERVER['DOCUMENT_ROOT']."/templates/main_content/main_menu.php");
?>
<div id="golovna" >
<!-- Авторизація та реєстрація -->
<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/templates/main_content/left.php");
?>
    <!-- Головний фрейм -->
<?php
    require($_SERVER['DOCUMENT_ROOT']."/templates/main_content/main_images.php"); 
?>   
   <!--Main menu-->
    <div id="news">
	<div > 
        <ul class="map1"> 
            <li><a href="/index.php" style="border-radius: 10px 0px 0px 0px;"><h3>Новини</h3></a> </li>
        </ul>
    </div>
		<hr/>
	<div>
		<ul class="map1">
			<li  ><a href=""><h3>Про коледж</h3></a> 
				<ul class="map2"> 
					<li><a href="administracia.php" style="height: 30px; padding-top: 10px;">Адміністрація</a></li>
					<li><a href="" style="height: 30px; padding-top: 10px;">Циклові комісії</a>
						<ul  class="map3"> 
							<li><a href="" style="height: 30px; padding-top: 10px;">Комп'ютерна інженерія</a></li>
							<li><a href="" style="height: 40px;">Фінанси, банківська справа та страхування</a></li>
							<li><a href="" style="height: 30px; padding-top: 10px;">Менеджмент</a></li>
							<li><a href="" style="height: 30px; padding-top: 10px;">Право</a></li>
							<li> <a href="" style="height: 40px;">Гуманітарно-природнича підготовка</a></li>
						</ul>
					</li>
					<li><a href="" style="height: 30px; padding-top: 10px;">Викладачі коледжу</a></li>
					<li><a href="licence.php" style="height: 30px; padding-top: 10px;">Ліцензії та сертифікати</a></li>
					<li><a href="" style="height: 30px; padding-top: 10px;">Контакти</a></li>
				</ul>
			</li>
        </ul>
    </div>
	<hr/>		
	<div>
        <ul class="map1">
			<li ><a href=""><h3>Абітурієнтам</h3></a> 
				<ul  class="map2"> 
					<li><a href="profession.php" style="height: 30px; padding-top: 10px;">Перлік спеціальностей</a></li>
					<li><a href="pravula_pryomu.php" style="height: 30px; padding-top: 10px;">Правила прийому</a></li>
					<li><a href="document_vstup.php" style="height: 40px; padding-top: 3px;">Перелік документів для вступу</a></li>
					<li><a href="cost_of_education.php" style="height: 30px; padding-top: 10px;">Вартість навчання</a></li>
					<li><a href="" style="height: 40px; padding-top: 4px;" >Графік консультацій та вступних випробувань</a></li>
					<li><a href="http://www.vstup.info/2017/i2017i2651.html" target="_blank" style="height: 30px; padding-top: 10px;">Рейтингові списки</a></li>
					<li><a href="comission.php" style="height: 30px; padding-top: 10px;">Приймальна комісія</a></li>
				</ul>
			</li>
        </ul>
    </div>
    <hr/>	
	<div>
        <ul class="map1">
			<li><a href=""><h3>Студентам</h3></a> 
				<ul class="map2"> 
					<li><a href="" style="height: 30px; padding-top: 10px;">Бібліотека</a></li>
					<li><a href="" style="height: 30px; padding-top: 10px;">Розклад занять</a></li>
					<li><a href="" style="height: 30px; padding-top: 10px;">Розклад дзвінків</a></li>
					<li><a href="" style="height: 30px; padding-top: 10px;">Електронні ресурси</a></li>
				</ul>
			</li>
        </ul>
    </div>
	<hr/>		
	<div>
        <ul class="map1">
            <li><a href=""><h3>Творче життя</h3></a>
				<ul class="map2"> 
				    <li> <a href="photo_gallery.php" style="height: 30px; padding-top: 10px;">Фотогалерея</a></li>
				    <li> <a href="video_gallery.php" style="height: 30px; padding-top: 10px;">Відеогалерея</a></li>
				</ul>
            </li>
        </ul>
    </div>		
	<br/><br/>
        
        
    </div>
</div>
