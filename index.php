
<?php
require_once("assets/geoIp/ipgeobase.php");
$ip=$_SERVER['REMOTE_ADDR'];
$gb = new IPGeoBase();
$data = $gb->getRecord('89.184.4.38');
$location = iconv('CP1251','UTF-8',$data['city']);
$city = "Казань";
$phone = "9872820884";
$phones =  array("Казань" =>"9872820884" ,
				 "Пермь"  =>"9638582280" ,
			 	 "Нижний Новгород" => "9870875777",
			 	 "Ульяновск" => "9370042178",
			 	 "Альметьевск" =>"9872690602" );

if(in_array($location, $phones)){

	$city = $location;
	$phone = $phones[$location];
}

?>
<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Respot</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="landing">
	<input type = "hidden" id ="city" value="<?=$city;?>">
	    <div class="modal fade" id="callbackForm" tabindex="-1" role="dialog" aria-labelledby="callbackModal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h2 class="modal-title" id="callbackModal">Подать заявку</h2>
					</div>
					<form>
					<div class="modal-body">
						<p>Оставьте заявку, наш специалист обязательно 
						свяжется с вами в течении 24 часов и с удовольствием проконсультирует 
						Вас по всем возникшим вопросам. </p>
						<div class="err-mess"></div>
					    <p><label>Введите Ваше имя*:</label></p>
					    <p><input name="name" id="name" type="text"></p>
	    			    <p><label>Введите Ваш город*:</label></p>
					    <p><input name="city" id="city" type="text"></p>
						<p><label >Введите Ваш телефон*:</label></p>
					    <p><input name="phone" id="phone" type="text"></p>
					</div>
					<div class="modal-footer">
						<p><input id="sends" type="button" value="Отправить"></p>
					</div>
				  </form>
				</div>
			</div>
        </div>


		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<img src ="images/logo+++.png" id="logo" style="display:none">
					<div class = "contacts">
						<a class="city" href="#" data-toggle="tooltip" title="Some tooltip text!"><?php echo $city; ?></a> 
						<a class="phone" href="tel:+7<?=$phone;?>">8<?php echo $phone; ?></a>
					</div>
					<nav id="nav">
						<ul>
							<li><a href="http://franchise.respot.ru">Франшиза</a></li>
							<li><a href="admin-login.php" class="button">Личный кабинет</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<h2><img src ="images/logo+++.png"></h2>
					<p>Ваши клиенты расскажут о Вас своим друзьям 
					<br>в социальных сетях</p>
					<ul class="actions">
						<li><a href="#" data-toggle="modal" data-target="#callbackForm" class="button">Узнать подробнее</a></li>
						<li><a target="_blank" href="files/kom.pdf" class="button">Презентация</a></li>
					</ul>
				</section>

			<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2>МЫ УВЕЛИЧИМ ПРОХОДИМОСТЬ
							<br />
							ЗАВЕДЕНИЯ В РАЗЫ</h2>
							<p>Ваш гость при подключении к Wi-Fi делает репост о  заведении, рассказывая о Вас своим друзьям. Тем самым вы получаете бюджетный и эффективный рекламный инструмент, привлекающий потенциальных клиентов.
							</p>
						</header>
						<span class="image featured"><img src="images/pic01.png" alt="" /></span>
					</section>

						<div class="row">
						<div class="6u 12u(narrower)">

							<section class="box special">
								<h3>Система позволит узнать многое о своем госте</h3>
								<span class="image featured"><img src="images/pic02.png" alt="" /></span>
								<p>Вся информация собирается в личном <br />  и оформляется в понятные <br />графики.</p>
								<ul class="actions">
									<li><a href="#" data-toggle="modal" data-target="#callbackForm" class="button alt">Проконсультироваться</a></li>
								</ul>
							</section>

						</div>
						<div class="6u 12u(narrower)">

							<section class="box special">
								<h3>О вас узнает масса<br /> людей</h3>
								<span class="image featured"><img src="images/pic03.png" alt="" /></span>
								<p>В среднем за месяц ваше объявление<br /> увидит более 180000 <br /> человек.</p>
								<ul class="actions">
									<li><a href="#" data-toggle="modal" data-target="#callbackForm" class="button alt">Сделать заказ</a></li>
								</ul>
							</section>

						</div>
					</div>

					<section class="box features special phone">
						<h2 class ="block">Как работает технология?</h2>
					    <div class="tech-block one-tech">
					    	<div class="text">
							  <p><strong>Мы устанавливаем</strong>
			                     оборудование 
			                    в заведении</p>
							</div>
							<div class="line"></div>
					    </div>
					    <div class="tech-block two-tech">
					    	<div class="text">
							  <p>Гость <strong>подключается </strong>
			                   к Wi-Fi</p>
							</div>
							<div class="line"></div>
					    </div>
					    <div class="tech-block three-tech">
					    	<div class="text">
							  <p><strong>Авторизуется</strong> 
			                   через соц сеть</p>
							</div>
							<div class="line"></div>
					    </div>
					    <div class="tech-block four-tech">
					    	<div class="text">
							  <p><strong>Размещает</strong> пост на своей странице</p>
							</div>
							<div class="line"></div>
					    </div>
					    <div class="tech-block five-tech">
					    	<div class="text">
							   <p>Заведение <strong>получает рекламу</strong> и аналитику гостей</p>
							</div>
					    </div>
					</section>

					<section class="box special features">

					<h2>Ценные возможности нашей системы</h2>

						<div class="features-row">
							<section>
								<span class="icon major fa-envelope accent2"></span>
								<h3>СМС - рассылка</h3>
								<p>Рассылайте СМС - сообщения вашим постоянным гостям.</p>
							</section>
							<section>
								<span class="icon major fa-users accent3"></span>
								<h3>Постоянные гости</h3>
								<p>Просматривайте частых гостей вашего заведения.</p>
							</section>
						</div>

						<div class="features-row">
							<section>
								<span class="icon major fa-calendar accent4"></span>
								<h3>Планирование постов</h3>
								<p>Спланируйте свою рекламную компанию на месяцы вперед.</p>
							</section>
							<section>
								<span class="icon major fa-birthday-cake accent5"></span>
								<h3>Дни рождения</h3>
								<p>Настройте один раз и смотрите как система будет поздравлять ваших именинников.</p>
							</section>
						</div>

						<div class="features-row">
							<section>
								<span class="icon major fa-paint-brush accent6"></span>
								<h3>Конструктор</h3>
								<p>Создайте фирменный баннер заведения без помощи дизайнера.</p>
							</section>
							<section>
								<span class="icon major fa-user accent7"></span>
								<h3>Профили гостей</h3>
								<p>Просматривайте аккаунты гостей в соц.сетях.</p>
							</section>
						</div>
						<a href="#" data-toggle="modal" data-target="#callbackForm" class="button alt block">Установить себе</a>
					</section>	
				</section>

			<!-- CTA -->
				<section id="cta">


					<h2>Оставьте заявку</h2>
					<p>Мы обязательно свяжемся с вами в течении 24 часов<br /> и подробнее расскажем о нашем продукте.</p>
					<div id="succesAlert" class="alert alert-success fade in" style="display:none">
					    <a href="#" class="close" data-dismiss="alert">&times;</a>
					    <strong>Отлично!</strong> Ваша заявка успешно отправлена!
					</div>
					<div id="errorAlert"class="alert alert-danger fade in" style="display:none">
					    <a href="#" class="close" data-dismiss="alert">&times;</a>
					    <strong>Извините!</strong> Отправка не удалась, попробуйте еще раз!
					</div>
					<div id="warningAlert"class="alert alert-danger fade in" style="display:none">
					    <a href="#" class="close" data-dismiss="alert">&times;</a>
					    Заполните все необходимые поля!
					</div>
					<form>
						<div class="row uniform 50%">
							<div class="8u 12u(mobilep)">

								<input type="text" name="name" id="names" placeholder="Имя" />
							</div>
							<div class="8u 12u(mobilep)">
								<input type="text" name="phone" id="phones" placeholder="Телефон" />
							</div>
							<div class="8u 12u(mobilep)">
								<input type="text" name="city" id="citys" placeholder="Город" />
							</div>
							<div class="4u 12u(mobilep)">
								<input type="button"  id="send" value="Оставить заявку" class="fit" />
							</div>
						</div>
					</form>

				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="copyright">
						<li>&copy; <img src ="images/logo-footer.png"></li><li><img src ="images/its.png"></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
</html>