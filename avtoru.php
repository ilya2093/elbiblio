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
			echo"<tbody>";
				echo"<tr>";
					echo"<td>";
						echo"<div class='container'>";
							echo"<table class='table_books'>";
								echo"<tbody>";
									echo"<tr>";
										echo"<td class='td_left_content'>";
											echo"<form class='spisavt' action='avtoru.php' method='POST'>";
												echo"<input type='submit' class='spisbuttonalf' value='А' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Б' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='В' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Г' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Д' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Е' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Ж' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='З' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='И' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Й' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='К' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Л' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='М' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Н' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='О' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='П' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Р' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='С' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Т' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='У' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Ф' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Х' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Ц' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Ч' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Ш' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Щ' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Ы' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Э' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Ю' name='alf'>";
												echo"<input type='submit' class='spisbuttonalf' value='Я' name='alf'>";
												echo"<input type='submit' class='spisbuttonavt' value='Все' name='avt'>";
											echo"</form>";
											$alf = $_POST[alf];
											$avtor = $_POST[avtor];
											$avt = $_POST[avt];
											if (isset($alf))
											{
											$query1 = ("SELECT * FROM `avtors` WHERE LEFT(family, 1) = '$alf' 
														ORDER BY `family`");
											}
											else if (isset($avt))
											{
											$query1 = ("SELECT * FROM `avtors` ORDER BY `family`");
											}
											else 
											{
											$query1 = ("SELECT * FROM `avtors` ORDER BY `family`");
											}
											$sql1 = mysql_query($query1);
											while ($row1= mysql_fetch_array($sql1))
											{
												echo"<form class='spisavt' action='avtoru.php' method='POST'>";
													echo"<input type='hidden' name='fio' value='$row1[id_avtor]'>";
													echo"<input type='submit' class='spisbuttonavtor' value='$row1[family] $row1[name] $row1[otchestvo]'>";
												echo"</form>";
											}
										echo"</td>";
										echo"<td class='splitter'>";
										echo"</td>";
										echo"<td class='td_right_content'>";
											echo"<div>";
												echo"<div class='lt26a'>";
													echo"<div class='perbooks'>";
														echo"<div class='books'>";
															echo"<table class='book'>";
																$fio = $_POST[fio];
																if (isset($fio))
																{
																$query = ("SELECT * FROM avtors WHERE `id_avtor`= '$fio' ORDER BY `date_insert`");
																$sql = mysql_query($query);
																$row= mysql_fetch_array($sql);
																echo"<tbody>";
																	echo"<tr>";
																		echo"<td class='lt22'>";
																			echo"<a class='' href='php/avtor.php'>";
																				echo"<img class='lt32' alt='' src='$row[foto]'>";
																			echo"</a>";
																		echo"</td>";
																		echo"<td class='item'>";
																			echo"<div >";
																				echo"<div class='description avtor_desc'>";
																					echo"<div class='desc_container'>";
																						echo"<div class='desc_box'>";
																							echo"<span class='desc1'>";
																							echo"ФИО: ";
																							echo"</span>";
																							echo"<span itemprop='author' itemscope='' itemtype='' class='desc2'>";
																									echo"$row[family] $row[name] $row[otchestvo]";
																							echo"</span>";
																						echo"</div>";
																						echo"<div class='desc_box'>";
																							echo"<span class='desc1'>";
																							echo"Дата рождения: ";
																							echo"</span>";
																							echo"<span itemprop='author' itemscope='' itemtype='' class='desc2'>";
																									echo"$row[date_rogdeniya]";
																							echo"</span>";
																						echo"</div>";
																						echo"<div class='desc_box'>";
																							echo"<span class='desc1'>";
																							echo"Гражданство: ";
																							echo"</span>";
																							echo"<span itemprop='author' itemscope='' itemtype='' class='desc2'>";
																									echo"$row[gragdanstvo]";
																							echo"</span>";
																						echo"</div>";
																					echo"</div>";
																				echo"</div>";
																			echo"</div>";
																		echo"</td>";
																	echo"</tr>";
																	echo"<tr>";
																		echo"<td colspan='2' style='padding:10px'>";
																			echo"<div class='item_description'>";
																				echo"<div class='lt37'>";
																					echo"<div itemprop='description' class='description'>";
																						echo"<div class='BBHtmlCode'>";
																							echo"<div class='BBHtmlCodeInner' handled='1'>";
																								echo"$row[biografiya]";	
																							echo"</div>";
																						echo"</div>";
																					echo"</div>";
																				echo"</div>";
																			echo"</div>";
																			echo"<div>";
																				$query_seriya = ("SELECT series.*, books.*, avtors.* FROM series, books, avtors 
																								WHERE books.seriya=series.id_seriya 
																								AND books.id_avtor=avtors.id_avtor
																								AND avtors.id_avtor='$row[id_avtor]'
																								GROUP BY series.name_seriya");
																				$sql_seriya = mysql_query($query_seriya);
																				while ($row_seriya= mysql_fetch_array($sql_seriya))
																				{	
																					echo"<form action='index.php' method='POST'>";
																						echo"<input type='hidden' name='seriya' value='$row_seriya[id_seriya]'>";
																						echo"<input type='submit' class='spisbutton' value='$row_seriya[name_seriya]'>";
																					echo"</form>";
																					$query_book = ("SELECT series.*, books.* FROM series, books 
																								WHERE books.seriya=series.id_seriya 
																								AND books.seriya = '$row_seriya[id_seriya]'
																								ORDER BY books.num_book_seriya");
																					$sql_book = mysql_query($query_book); 
																					while ($row_book = mysql_fetch_array($sql_book))
																					{
																						echo"<form action='index.php' method='POST'>";
																							echo"<input type='hidden' name='book' value='$row_book[id_book]'>";
																							echo"<input type='submit' class='spisbuttonbook' value='$row_book[name_book]'>";
																						echo"</form>";
																					}
																				}
																			echo"</div>";
																		echo"</td>";
																	echo"</tr>";
																echo"</tbody>";
																}
																if (isset($avtor))
																{
																$query = ("SELECT * FROM avtors WHERE `id_avtor`= '$avtor' ORDER BY `date_insert`");
																$sql = mysql_query($query);
																$row= mysql_fetch_array($sql);
																echo"<tbody>";
																	echo"<tr>";
																		echo"<td class='lt22'>";
																			echo"<a class='' href='php/avtor.php'>";
																				echo"<img class='lt32' alt='' src='$row[foto]'>";
																			echo"</a>";
																		echo"</td>";
																		echo"<td class='item'>";
																			echo"<div >";
																				echo"<div class='description avtor_desc'>";
																					echo"<div class='desc_container'>";
																						echo"<div class='desc_box'>";
																							echo"<span class='desc1'>";
																							echo"ФИО: ";
																							echo"</span>";
																							echo"<span itemprop='author' itemscope='' itemtype='' class='desc2'>";
																									echo"$row[family] $row[name] $row[otchestvo]";
																							echo"</span>";
																						echo"</div>";
																						echo"<div class='desc_box'>";
																							echo"<span class='desc1'>";
																							echo"Дата рождения: ";
																							echo"</span>";
																							echo"<span itemprop='author' itemscope='' itemtype='' class='desc2'>";
																									echo"$row[date_rogdeniya]";
																							echo"</span>";
																						echo"</div>";
																						echo"<div class='desc_box'>";
																							echo"<span class='desc1'>";
																							echo"Гражданство: ";
																							echo"</span>";
																							echo"<span itemprop='author' itemscope='' itemtype='' class='desc2'>";
																									echo"$row[gragdanstvo]";
																							echo"</span>";
																						echo"</div>";
																					echo"</div>";
																				echo"</div>";
																			echo"</div>";
																		echo"</td>";
																	echo"</tr>";
																	echo"<tr>";
																		echo"<td colspan='2' style='padding:10px'>";
																			echo"<div class='item_description'>";
																				echo"<div class='lt37'>";
																					echo"<div itemprop='description' class='description'>";
																						echo"<div class='BBHtmlCode'>";
																							echo"<div class='BBHtmlCodeInner' handled='1'>";
																								echo"$row[biografiya]";	
																							echo"</div>";
																						echo"</div>";
																					echo"</div>";
																				echo"</div>";
																			echo"</div>";
																			echo"<div>";
																				$query_seriya = ("SELECT series.*, books.*, avtors.* FROM series, books, avtors 
																								WHERE books.seriya=series.id_seriya 
																								AND books.id_avtor=avtors.id_avtor
																								AND avtors.id_avtor='$row[id_avtor]'
																								GROUP BY series.name_seriya");
																				$sql_seriya = mysql_query($query_seriya);
																				while ($row_seriya= mysql_fetch_array($sql_seriya))
																				{	
																					echo"<form action='index.php' method='POST'>";
																						echo"<input type='hidden' name='seriya' value='$row_seriya[id_seriya]'>";
																						echo"<input type='submit' class='spisbutton' value='$row_seriya[name_seriya]'>";
																					echo"</form>";
																					$query_book = ("SELECT series.*, books.* FROM series, books 
																								WHERE books.seriya=series.id_seriya 
																								AND books.seriya = '$row_seriya[id_seriya]'
																								ORDER BY books.num_book_seriya");
																					$sql_book = mysql_query($query_book); 
																					while ($row_book = mysql_fetch_array($sql_book))
																					{
																						echo"<form action='index.php' method='POST'>";
																							echo"<input type='hidden' name='book' value='$row_book[id_book]'>";
																							echo"<input type='submit' class='spisbuttonbook' value='$row_book[name_book]'>";
																						echo"</form>";
																					}
																				}
																			echo"</div>";
																		echo"</td>";
																	echo"</tr>";
																echo"</tbody>";
																}
															echo"</table>";															
														echo"</div>";
													echo"</div>";
												echo"</div>";
											echo"</div>";
										echo"</td>";
									echo"</tr>";
								echo"</tbody>";
							echo"</table>";
						echo"</div>";
					echo"</td>";
				echo"</tr>";
			echo"</tbody>";
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