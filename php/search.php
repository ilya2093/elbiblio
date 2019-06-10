<?php
session_start();
include_once("bd.php");
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
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="shortcut icon" href="../favicon.png" />
	<link rel="stylesheet" href="../../libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="../../libs/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../../libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="../../libs/owl-carousel/owl.carousel.css" />
	<link rel="stylesheet" href="../../libs/countdown/jquery.countdown.css" />
	<link rel="stylesheet" href="../../css/fonts.css" />
	<link rel="stylesheet" href="../../css/main.css" />
	<link rel="stylesheet" href="../../css/media.css" />
	<script type="text/javascript" src="./js/jquery-1.10.2.min.js"></script>
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
					<form action="search.php" method="post" class="search_panel">
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
				<a href="../index.php">Библиотека</a>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 center">
				<a href="../avtoru.php">Авторы</a>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 center">
				<a href="../help.php">Справка</a>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 center">
				<a href="../kontaktu.php">Контакты</a>
			</div>		
		</nav>
		<div class="container">
			
		</div>
	</header>
	<main class="container">
		<?php
		echo"<table class='table_books'>";
			$pv=$_POST[pv];
			$query_seriya = "SELECT * FROM series 
						WHERE name_seriya LIKE '%$pv%'";
			$query_book="SELECT * FROM books 
						WHERE name_book LIKE '%$pv%' "; 
			$query_avtor="SELECT * FROM avtors 
						WHERE name LIKE '%$pv%' OR family LIKE '%$pv%' 
						OR otchestvo LIKE '%$pv%' OR CONCAT(name, ' ', family, ' ', otchestvo) LIKE '%$pv%'
						OR CONCAT(family, ' ', name, ' ', otchestvo) LIKE '%$pv%'
						OR CONCAT(otchestvo, ' ', family, ' ', name) LIKE '%$pv%'"; 
			$query_ganr="SELECT * FROM ganr 
						WHERE name_ganr LIKE '%$pv%' "; 
			$sql_seriya = mysql_query($query_seriya);
			$sql_book = mysql_query($query_book);
			$sql_avtor = mysql_query($query_avtor);
			$sql_ganr = mysql_query($query_ganr);
			echo"Результаты поиска:";
			while ($row_seriya= mysql_fetch_array($sql_seriya))
			{
				echo"<form action='../index.php' method='POST'>";
					echo"<input type='hidden' name='seriya' value='$row_seriya[id_seriya]'>";
					echo"<input type='submit' class='spisbutton' value='Серия: $row_seriya[name_seriya]'>";
				echo"</form>";
			}
			while ($row_book= mysql_fetch_array($sql_book))
			{
				echo"<form action='../index.php' method='POST'>";
					echo"<input type='hidden' name='book' value='$row_book[id_book]'>";
					echo"<input type='submit' class='spisbutton' value='$row_book[name_book]'>";
				echo"</form>";
			}
			while ($row_avtor= mysql_fetch_array($sql_avtor))
			{
				echo"<form action='../avtoru.php' method='POST'>";
					echo"<input type='hidden' name='fio' value='$row_avtor[id_avtor]'>";
					echo"<input type='submit' class='spisbutton' value='$row_avtor[family] $row_avtor[name] $row_avtor[otchestvo]'>";
				echo"</form>";
			}
			while ($row_ganr= mysql_fetch_array($sql_ganr))
			{
				echo"<form action='../index.php' method='POST'>";
					echo"<input type='hidden' name='ganr' value='$row_ganr[id_ganr]'>";
					echo"<input type='submit' class='spisbutton' value='$row_ganr[name_ganr]'>";
				echo"</form>";
			}
		echo"</table>";
		?>
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
