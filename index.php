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
	<meta name="viewport" content="width=device-width, initial-scale=1">	
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
					<form action="php/search.php" method="POST" class="search_panel">
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
		<div class="container">
			<div class="top_m">
				<div class="widget_tab">
					Бестселлеры месяца
				</div>
				<div class="art_main">
				<?php
					$query = ("SELECT * FROM books ORDER BY `reyting` LIMIT 8");
					$sql = mysql_query($query);
					while ($row= mysql_fetch_array($sql))
					{
						echo"<div class='art_td_c'>";
							echo"<a href='index.php?book=$row[id_book]'>";
								echo"<img class='art_c' alt='' src='$row[obl]' >";
							echo"</a>";
						echo"</div>";
					}
				?>
				</div>
			</div>
		</div>
	</header>
	<main class="container">
		<?php
		echo"<table class='table_books'>";
			$ganr = $_POST[ganr];
			$alf=$_POST[alf];
			$seriya=$_POST[seriya];
			$book=$_GET[book];
			$book=$_POST[bookid];
			if (isset($ganr))
			{
			$query = ("SELECT books.*, avtors.*, series.* FROM books, avtors, series 
						WHERE books.id_avtor=avtors.id_avtor AND series.id_seriya=books.seriya
						AND books.ganr='$ganr'
						ORDER BY books.date_insert");
			}
			else if (isset($_POST['new']))
			{
			$date_year = date ('Y');
			$query = ("SELECT books.*, avtors.*, series.* FROM books, avtors, series 
						WHERE books.id_avtor=avtors.id_avtor AND series.id_seriya=books.seriya
						AND books.date_pechati = '$date_year'
						ORDER BY books.date_insert");
			}
			else if (isset($_POST[popular]))
			{
			$query = ("SELECT books.*, avtors.*, series.* FROM books, avtors, series 
						WHERE books.id_avtor=avtors.id_avtor AND series.id_seriya=books.seriya 
						AND books.reyting > 6
						ORDER BY books.date_insert");
			}
			else if (isset($alf))
			{
			$query = ("SELECT books.*, avtors.*, series.* FROM books, avtors, series 
						WHERE books.id_avtor=avtors.id_avtor AND series.id_seriya=books.seriya 
						AND LEFT(books.name_book, 1) = '$alf'
						ORDER BY books.date_insert");
			}
			else if (isset($_POST[vse]))
			{
			$query = ("SELECT books.*, avtors.*, series.* FROM books, avtors, series 
						WHERE books.id_avtor=avtors.id_avtor AND series.id_seriya=books.seriya
						ORDER BY books.date_insert");
			}
			else if (isset($seriya))
			{
			$query = ("SELECT books.*, avtors.*, series.* FROM books, avtors, series 
						WHERE books.id_avtor=avtors.id_avtor AND series.id_seriya=books.seriya
						AND books.seriya = '$seriya'
						ORDER BY books.date_insert");
			}
			else if (isset($book))
			{
			$query = ("SELECT books.*, avtors.*, series.* FROM books, avtors, series 
						WHERE books.id_avtor=avtors.id_avtor AND series.id_seriya=books.seriya
						AND books.id_book = '$book'
						ORDER BY books.date_insert");
			}
			else
			{
			$query = ("SELECT books.*, avtors.*, series.* FROM books, avtors, series 
						WHERE books.id_avtor=avtors.id_avtor AND series.id_seriya=books.seriya
						ORDER BY books.date_insert");
			}
			$sql = mysql_query($query);
			echo"<tbody>";
				echo"<tr>";
					echo"<td>";
						echo"<div class='container'>";
							echo"<table class='table_books'>";
								echo"<tbody>";
									echo"<tr>";
										echo"<td class='td_left_content'>";
												echo"<form class='spisavt' action='index.php' method='POST'>";
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
												echo"</form>";
												echo"Жанры";
												$queryganr = ("SELECT * FROM `ganr` WHERE 1 ");
												$sqlganr = mysql_query($queryganr);
												while ($rowganr = mysql_fetch_array($sqlganr))
												{
												echo"<form class='spisavt' action='index.php' method='POST'>";
													echo"<input type='hidden' name='ganr' value='$rowganr[id_ganr]'>";
													echo"<input type='submit' class='spisbutton' value='$rowganr[name_ganr]'>";
												echo"</form>";	
												}
										echo"</td>";
										echo"<td class='splitter'>";
											
										echo"</td>";
										echo"<td class='td_right_content'>";
											echo"<div>";
												echo"<div class='lt26a'>";
													echo"<div class='perbooks'>";
														echo"<ul class='lt_ui_ul'>";
															echo"<li class='it_ui_li'>";
																echo"<form class='' action='index.php' method='POST'>";
																	echo"<input type='submit' class='spisfiltr' name='vse' value='Все'>";
																echo"</form>";
															echo"</li>";
															echo"<li class='it_ui_li'>";
																echo"<form class='' action='index.php' method='POST'>";
																	echo"<input type='submit' class='spisfiltr' name='new' value='Новые'>";
																echo"</form>";
															echo"</li>";
															echo"<li class='it_ui_li'>";
																echo"<form class='' action='index.php' method='POST'>";
																	echo"<input type='submit' class='spisfiltr' name='popular' value='Популярные'>";
																echo"</form>";
															echo"</li>";
														echo"</ul>";
														while ($row = mysql_fetch_array($sql))
														{
														echo"<div class='books'>";
															echo"<table class='book'>";
																echo"<tbody>";
																	echo"<tr>";
																		echo"<td class='lt22'>";
																			echo"<img class='lt32' alt='' src='$row[obl]'>";
																			$query_read_list = ("SELECT read_list.*, books.*, status_read_list.*, reg.* FROM books, read_list, status_read_list, reg 
																								WHERE read_list.id_user=REG.id AND read_list.id_book='$row[id_book]' 
																								AND status_read_list.id_status_read_list=read_list.id_status_read_list");
																			$sql_read_list = mysql_query($query_read_list);
																			$row_read_list = mysql_fetch_array($sql_read_list);
																			echo"<form action='php/status_read_list.php' method='post'>";
																				echo"<input type='hidden' name='id_user' value='$_SESSION[ID]'>";
																				echo"<input type='hidden' name='id_book' value='$row[id_book]'>";
																				echo"<select class='readlist' name='status_read_list' onchange='submit();'>";
																				if (isset($row_read_list[name_status]))
																				{
																				echo"<option disabled selected>$row_read_list[name_status]</option>";
																				}
																				else
																				{
																				echo"<option disabled selected>Добавить в список</option>";
																				}
																				echo"<option value='1'>Запланировано</option>";
																				echo"<option value='2'>Читаю</option>";
																				echo"<option value='3'>Прочитано</option>";
																				echo"<option value='4'>Отложено</option>";
																				echo"<option value='5'>Брошено</option>";
																				echo"<option value='10'>Удалить</option>";
																				echo"</select>";
																			echo"</form>";
																		echo"</td>";
																		echo"<td class='item'>";
																			echo"<div >";
																				echo"<div class='book_name'>";
																					echo"<span>$row[name_book]</span>";
																				echo"</div>";
																				echo"<div class='description'>";
																					echo"<div class='desc_container'>";
																						echo"<div class='desc_box'>";
																							echo"<span class='desc1'>";
																								echo"Серия:";
																							echo"</span>";
																								echo"<form action='index.php' method='POST'>";
																									echo"<input type='hidden' name='seriya' value='$row[id_seriya]'>";
																									echo"<input type='submit' class='spisbutton' value='$row[name_seriya]'>";
																								echo"</form>";
																						echo"</div>";
																						echo"<div class='desc_box'>";
																							echo"<span class='desc1'>";
																							echo"Автор:";
																							echo"</span>";
																								echo"<form action='avtoru.php'method='POST'>";
																									echo"<input type='hidden' name='avtor' value='$row[id_avtor]'>";
																									echo"<input type='submit' class='spisbutton' value='$row[family] $row[name] $row[otchestvo]'>";
																								echo"</form>";
																						echo"</div>";
																						echo"<div class='desc_box'>";
																							echo"<span class='desc1'>";
																								echo"Жанр:";
																							echo"</span>";
																							$query_ganr = ("SELECT books.*, ganr.* FROM books, ganr WHERE books.ganr=ganr.id_ganr");
																							$sql_ganr = mysql_query($query_ganr);
																							$row_ganr= mysql_fetch_array($sql_ganr);
																							echo"<span itemprop='genre' class='desc2'>"; 
																									echo"$row_ganr[name_ganr]";
																							echo"</span>";
																						echo"</div>";
																						echo"<div class='desc_box'>";
																							echo"<span class='desc1'>";
																								echo"Язык книги:";
																							echo"</span>";
																							$query_lang = ("SELECT books.*, langs.* FROM books, langs WHERE books.lang_book=langs.id_lang");
																							$sql_lang = mysql_query($query_lang);
																							$row_lang= mysql_fetch_array($sql_lang);
																							echo"<span class='desc2'>"; 
																								echo"$row_lang[name_lang]";
																							echo"</span>";
																							echo"<span class='desc1'>";
																								echo"Страниц:";
																							echo"</span>";
																							echo"<span class='desc2'>"; 
																								echo"$row[count_sheat]";
																							echo"</span>";
																						echo"</div>";
																						echo"<div class='desc_box'>";
																						$query_status = ("SELECT books.*, status_book.* FROM books, status_book WHERE books.status_book=status_book.id_status");
																						$sql_status = mysql_query($query_status);
																						$row_status= mysql_fetch_array($sql_status);
																							echo"<span class='desc1' style='color:#32ae17;'>";
																								echo"$row_status[name_status]";
																							echo"</span>";				
																						echo"</div>";
																					echo"</div>";
																				echo"</div>";
																				echo"<div class='lt25'>";
																					echo"<div style='float:left;'>";
																						echo"<div style='width:180px; padding-top: 10px; margin-bottom: 13px;'>";
																							echo"<form action='read_book/index.php' method='POST'>";
																								echo"<input type='hidden' name='id_book' value='$row[id_book]'>";
																								echo"<input type='submit' class='readbutton' value='Читать' name='read' >";
																							echo"</form>";
																						echo"</div>";
																						echo"<div style='padding-top:13px; margin-bottom: 13px;'>";
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
																							echo"<div class='BBHtmlCodeInner'>";
																								echo"$row[annotaciya]";
																							echo"</div>";
																						echo"</div>";
																					echo"</div>";
																				echo"</div>";
																			echo"</div>";
																		echo"</td>";
																	echo"</tr>";
																echo"</tbody>";
															echo"</table>";															
														echo"</div>";
														}
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