<?php
session_start();
include_once("php/bd.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>ЭБС</title>
	<meta name="description" content="" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="libs/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="libs/owl-carousel/owl.carousel.css" />
	<link rel="stylesheet" href="libs/countdown/jquery.countdown.css" />
	<link rel="stylesheet" href="css/fonts.css" />
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/media.css" />
	<style type="text/css">
	.user_avatar_avatar {
		display: block;
		width: 40px;
		height: 40px;
		<?php
		echo "background: url('%".$_SESSION['avatar']."%');";
		echo "background-image: url('%".$_SESSION['avatar']."%');";
		?>
		padding-top: 1px;
	}
	</style>
</head>
<body>
	<header class="container">
		<div class="container hap">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				
			</div>
			<div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
				<div class="header_search">
					<form action="php/search.php" method="get" class="search_panel">
							<button type="submit" name="search" class="batsearch"></button>
							<div style="margin-right: 40px;">
								<input name="pv" value="" type="text" id="pv" class="search_input" maxlength="50" autocomplete="off">
							</div>
					</form>
				</div>
			</div>
			<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1">
				<?php
				If (isset($_SESSION['avatar']))
				{
				echo"<a class='' href='lk.php'>";
					echo"<span class='user-logo-wrapper'>";
						echo"<span class='user_logo'>";
							echo"<span class='user_avatar_dummy';>";
							echo"</span>";
						echo"</span>";
					echo"</span>";
				echo"</a>";
				}
				else 
				{
				echo"<a class='' href='login.php'>";
					echo"<span class='user-logo-wrapper'>";
						echo"<span class='user_logo'>";
							echo"<span class='user_avatar_dummy'>";
							echo"</span>";
						echo"</span>";
					echo"</span>";
				echo"</a>";
				}
				?>
			</div>
			<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 ">
				<?php
				If (isset($_SESSION['avatar']))
				{
				echo"<a class='exitbutton' href='php/exit.php'>";
					echo"Выйти";
				echo"</a>";
				}
				?>
			</div>
		</div>
		<nav class="container nav">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 center">
				<a href="index.php">Библиотека</a>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 center">
				<a href="avtoru.php">Авторы</a>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 center">
				<a href="help.php">Справка</a>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 center">
				<a href="kontaktu.php">Контакты</a>
			</div>		
		</nav>
	</header>
	<main class="container">
		<?php
		echo"<table class='table_books'>";
			
		echo"</table>";
		?>
	<div class="kontakt">
		<h2 id="module68137" class=" moduletitle">Телефоны и электронные адреса МБУК "Чайковская ЦБС"</h2>
			<p><strong>Администрация ЦБС</strong></p>
			<p>Директор: Степанкова Светлана Петровна - т. <a href="tel:47713" class="atel">4-77-13</a>, e-mail: <a href="https://mail.yandex.ru/?uid=126554603&amp;login=chaikcbs#compose?to=cbs_stepankova%40mail.ru" class="aemail">cbs_stepankova@mail.ru</a></p>
			<p>Методист: Кожевина Наталья Александровна - т. <a href="tel:47713" class="atel">4-77-13</a>, e-mail: <a href="https://mail.yandex.ru/?uid=126554603&amp;login=chaikcbs#compose?to=cbsmetod%40mail.ru" class="aemail">cbsmetod@mail.ru</a></p>
			<p>Главный хранитель фондов: Усова Надежда Ивановна - т. <a href="tel:47710" class="atel">4-77-10</a>, e-mail: <a href="https://mail.yandex.ru/?uid=126554603&amp;login=chaikcbs#compose?to=cbs2008ok%40rambler.ru"  class="aemail">cbs2008ok@rambler.ru</a></p>
			<p><b>Бухгалтерия<br></b> т. <a href="tel:47705" class="atel">4-77-05</a><br>, e-mail: <a href="https://mail.yandex.ru/?uid=126554603&amp;login=chaikcbs#compose?to=cbschaik%40mail.ru"  class="aemail">cbschaik@mail.ru</a></p>
			<p><b>Центральная библиотека<br></b>т. <a href="tel:24151" class="atel">2-41-51</a><br>e-mail: <a href="https://mail.yandex.ru/?uid=126554603&amp;login=chaikcbs#compose?to=chaikcbs%40mail.ru" class="aemail">chaikcbs@yandex.ru</a></p>
			<p><b>Центральная детская библиотека<br></b>т. <a href="tel:23757" class="atel">2-37-57</a><br>E-mail:<a href="https://mail.yandex.ru/?uid=126554603&amp;login=chaikcbs#compose?to=cbs2006det%40mail.ru" class="aemail">cbs2006det@rambler.ru</a></p>
			<p><b>Библиотека № 1<br></b>т. <a href="tel:20512" class="atel">2-05-12</a><br>E-mail: <a href="https://mail.yandex.ru/?uid=126554603&amp;login=chaikcbs#compose?to=chaiklibf1.59%40yandex.ru" class="aemail">chaiklibf1.59@mail.ru</a></p>
			<p><b>Библиотека № 3<br></b>т. <a href="tel:60496" class="atel">6-04-96</a><br>E-mail: <a href="https://mail.yandex.ru/?uid=126554603&amp;login=chaikcbs#compose?to=det.biblioteka3%40yandex.ru" class="aemail">det.biblioteka3@gmail.com</a></p>
			<p><b>Библиотека № 5<br></b>т. <a href="tel:63245" class="atel">6-32-45</a><br>E-mail: <a href="https://mail.yandex.ru/?uid=126554603&amp;login=chaikcbs#compose?to=suhorukovaolga1961%40yandex.ru" class="aemail">suhorukovaolga1961@yandex.ru</a></p>
			<p><b>Библиотека № 7<br></b>т. <a href="tel:20764" class="atel">2-07-64</a><br>E-mail: <a href="https://mail.yandex.ru/?uid=126554603&amp;login=chaikcbs#compose?to=cbs-filial7%40yandex.ru" class="aemail">cbs-filial7@yandex.ru</a></p>
			<p><b>Библиотека № 9<br></b>т. <a href="tel:26135" class="atel">2-61-35</a><br>E-mail: <a href="https://mail.yandex.ru/?uid=126554603&amp;login=chaikcbs#compose?to=ya.bf9%40yandex.ru" class="aemail">ya.bf9@yandex.ru</a></p>
			<p><b>Библиотека № 10<br></b>т. <a href="tel:61475" class="atel">6-14-75</a><br>E-mail: <a href="https://mail.yandex.ru/?uid=126554603&amp;login=chaikcbs#compose?to=filial10b%40yandex.ru" class="aemail">filial10b@mail.ru</a></p>
			<p>&nbsp;</p>
		<input type="hidden" name="ctl00$mainContent$ctl00$hdnIsDirty" id="ctl00_mainContent_ctl00_hdnIsDirty">
	</div>
	</main>
	<footer class="container">
		
	</footer>
	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->
	<script src="libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="libs/jquery-mousewheel/jquery.mousewheel.min.js"></script>
	<script src="libs/fancybox/jquery.fancybox.pack.js"></script>
	<script src="libs/waypoints/waypoints-1.6.2.min.js"></script>
	<script src="libs/scrollto/jquery.scrollTo.min.js"></script>
	<script src="libs/owl-carousel/owl.carousel.min.js"></script>
	<script src="libs/countdown/jquery.plugin.js"></script>
	<script src="libs/countdown/jquery.countdown.min.js"></script>
	<script src="libs/countdown/jquery.countdown-ru.js"></script>
	<script src="libs/landing-nav/navigation.js"></script>
	<script src="js/common.js"></script>
	<!-- Yandex.Metrika counter --><!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter25346996 = new Ya.Metrika({id:25346996, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/25346996" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
	<!-- Google Analytics counter --><!-- /Google Analytics counter -->
</body>
</html>