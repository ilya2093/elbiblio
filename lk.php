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
	<title>Личный кабинет</title>
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
							echo"<span class='user_avatar_dummy'>";
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
			<?php
			$query_adm = ("SELECT REG.*, class_users.* FROM REG, class_users 
							WHERE REG.id_class=class_users.id_class AND ID = '$_SESSION[ID]'");
			$sql_adm = mysql_query($query_adm);
			$row_adm = mysql_fetch_array($sql_adm);
			if ($row_adm[count_priv]>7)
			{
			echo"<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3 center'>";
				echo"<a href='index.php'>Библиотека</a>";
			echo"</div>";
			echo"<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3 center'>";
				echo"<a href='lk.php'>Личные данные</a>";
			echo"</div>";
			echo"<div class='col-xs-4 col-sm-3 col-md-3 col-lg-3 center'>";
				echo"<a href='spis.php'>Список литературы</a>";
			echo"</div>";
			echo"<div class='col-xs-2 col-sm-3 col-md-3 col-lg-3 center'>";
				echo"<a href='adminpan/adminpan.php'>Управление</a>";
			echo"</div>";
			}
			else
			{
			echo"<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 center'>";
				echo"<a href='index.php'>Библиотека</a>";
			echo"</div>";
			echo"<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 center'>";
				echo"<a href='lk.php'>Личные данные</a>";
			echo"</div>";
			echo"<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 center'>";
				echo"<a href='spis.php'>Список литературы</a>";
			echo"</div>";
			}
			?>
		</nav>
		<div class="container">
			
		</div>
	</header>
	<main class="container">
		<?php
		$passedit = $_POST[passedit];
		$update = $_POST[update];
		$updatepass = $_POST[updatepass];
		if (isset($passedit))
		{
		echo"<form action='lk.php' method='post'>";
			echo"<table class='tablelk'>";
				echo"<tr>";
					echo"<td>";
						echo"Старый пароль: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='text' class='inputlk' name='PASSWORDst' value=''>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Новый пароль: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='text' class='inputlk' name='PASSWORDnew' value=''>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td colspan='2'>";
						echo"<input type='submit' class='spisbuttonlk' name='updatepass' value='Изменить' >";
					echo"</td>";
				echo"</tr>";
			echo"</table>";
		echo"</form>";
		}
		else if (isset($updatepass))
		{
			$PASSWORDst = $_POST[PASSWORDst];
			$PASSWORDnew = $_POST[PASSWORDnew];
			$PASSWORDst = md5($PASSWORDst);
			$PASSWORDnew = md5($PASSWORDnew);
			$user = mysql_query("SELECT REG.*, class_users.* FROM REG,class_users 
								WHERE REG.ID='$_SESSION[ID]' AND REG.PASSWORD='$PASSWORDst'");
			$rowuser = mysql_fetch_array($user);
			if (isset($rowuser[ID]))
			{
				$query1 = ("UPDATE REG SET PASSWORD='$PASSWORDnew'
							WHERE REG.ID = '$_SESSION[ID]' AND REG.PASSWORD='$PASSWORDst'");
				$sql1 = mysql_query($query1);
				$query = ("SELECT REG.*, class_users.* FROM REG, class_users 
							WHERE ID = '$_SESSION[ID]' AND REG.id_class=class_users.id_class");
				$sql = mysql_query($query);
				$row = mysql_fetch_array($sql);
				echo"<form action='lk.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Логин: ";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='LOGIN' value='$row[LOGIN]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"E-mail: ";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='EMAIL' value='$row[EMAIL]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Имя: ";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='NAME_USER' value='$row[NAME_USER]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Фамилия: ";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='LASTNAME' value='$row[LASTNAME]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Уровень пользователя: ";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='name_class' value='$row[name_class]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Пароль: ";
							echo"</td>";
							echo"<td>";
								echo"<input type='submit' class='spisbuttonlk' name='passedit' value='Изменить пароль'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbuttonlk' name='update' value='Изменить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
			}
			else
			{
				echo"Введен неверный пароль. Повторите ввод.";
				echo"<form action='lk.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Старый пароль: ";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='PASSWORDst' value=''>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Новый пароль: ";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='PASSWORDnew' value=''>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbuttonlk' name='updatepass' value='Изменить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
			}
		}
		else if (isset($update))
		{
		$LOGIN = $_POST[LOGIN];
		$EMAIL = $_POST[EMAIL];
		$NAME_USER = $_POST[NAME_USER];
		$LASTNAME = $_POST[LASTNAME];
		$query1 = ("UPDATE REG SET LOGIN='$LOGIN',
					EMAIL='$EMAIL',NAME_USER='$NAME_USER',
					LASTNAME='$LASTNAME'
					WHERE REG.ID = '$_SESSION[ID]'");
		$sql1 = mysql_query($query1);
		$query = ("SELECT REG.*, class_users.* FROM REG, class_users 
					WHERE ID = '$_SESSION[ID]' AND REG.id_class=class_users.id_class");
		$sql = mysql_query($query);
		$row = mysql_fetch_array($sql);
		echo"<form action='lk.php' method='post'>";
			echo"<table class='tablelk'>";
				echo"<tr>";
					echo"<td>";
						echo"Логин: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='text' class='inputlk' name='LOGIN' value='$row[LOGIN]'>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"E-mail: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='text' class='inputlk' name='EMAIL' value='$row[EMAIL]'>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Имя: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='text' class='inputlk' name='NAME_USER' value='$row[NAME_USER]'>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Фамилия: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='text' class='inputlk' name='LASTNAME' value='$row[LASTNAME]'>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Уровень пользователя: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='text' class='inputlk' name='name_class' value='$row[name_class]'>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Пароль: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='submit' class='spisbuttonlk' name='passedit' value='Изменить пароль'>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td colspan='2'>";
						echo"<input type='submit' class='spisbuttonlk' name='update' value='Изменить' >";
					echo"</td>";
				echo"</tr>";
			echo"</table>";
		echo"</form>";
		}
		else
		{
		$query = ("SELECT REG.*, class_users.* FROM REG, class_users 
					WHERE ID = '$_SESSION[ID]' AND REG.id_class=class_users.id_class");
		$sql = mysql_query($query);
		$row = mysql_fetch_array($sql);
		echo"<form action='lk.php' method='post'>";
			echo"<table class='tablelk'>";
				echo"<tr>";
					echo"<td>";
						echo"Логин: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='text' class='inputlk' name='LOGIN' value='$row[LOGIN]'>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"E-mail: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='text' class='inputlk' name='EMAIL' value='$row[EMAIL]'>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Имя: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='text' class='inputlk' name='NAME_USER' value='$row[NAME_USER]'>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Фамилия: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='text' class='inputlk' name='LASTNAME' value='$row[LASTNAME]'>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Уровень пользователя: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='text' class='inputlk' name='name_class' value='$row[name_class]'>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"Пароль: ";
					echo"</td>";
					echo"<td>";
						echo"<input type='submit' class='spisbuttonlk' name='passedit' value='Изменить пароль'>";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td colspan='2'>";
						echo"<input type='submit' class='spisbuttonlk' name='update' value='Изменить' >";
					echo"</td>";
				echo"</tr>";
			echo"</table>";
		echo"</form>";
		}
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