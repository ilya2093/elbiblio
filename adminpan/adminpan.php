<?php
session_start();
include_once("../php/bd.php");
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
	<link rel="shortcut icon" href="../favicon.png" />
	<link rel="stylesheet" href="../libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="../libs/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="../libs/owl-carousel/owl.carousel.css" />
	<link rel="stylesheet" href="../libs/countdown/jquery.countdown.css" />
	<link rel="stylesheet" href="../css/fonts.css" />
	<link rel="stylesheet" href="../css/main.css" />
	<link rel="stylesheet" href="../css/media.css" />
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
					<form action="../php/search.php" method="get" class="search_panel">
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
				echo"<a class='' href='../lk.php'>";
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
				echo"<a class='exitbutton' href='../php/exit.php'>";
					echo"Выйти";
				echo"</a>";
				}
				?>
			</div>
		</div>
		<nav class="container nav">
			<?php
			echo"<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3 center'>";
				echo"<a href='../index.php'>Библиотека</a>";
			echo"</div>";
			echo"<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3 center'>";
				echo"<a href='../lk.php'>Личные данные</a>";
			echo"</div>";
			echo"<div class='col-xs-4 col-sm-3 col-md-3 col-lg-3 center'>";
				echo"<a href='../spis.php'>Список литературы</a>";
			echo"</div>";
			echo"<div class='col-xs-2 col-sm-3 col-md-3 col-lg-3 center'>";
				echo"<a href='adminpan.php'>Управление</a>";
			echo"</div>";
			?>
		</nav>
		<div class="container">
			
		</div>
	</header>
	<main class="container">
		<?php
			$tablebd = $_POST[tablebd];
			if (isset($_POST[avtorinsert]))
			{
				$id_avtor=$_POST[id_avtor];
				if (isset($_POST[id_avtor]))
				{
					$name = $_POST[name];
					$family = $_POST[family];
					$otchestvo = $_POST[otchestvo];
					$biografiya = $_POST[biografiya];
					$foto = $_POST[foto];
					$date_rogdeniya = $_POST[date_rogdeniya];
					$gragdanstvo = $_POST[gragdanstvo];
					$query = ("UPDATE `avtors` SET `name`='$name',`family`='$family',`otchestvo`='$otchestvo',
										`biografiya`='$biografiya',`date_rogdeniya`='$date_rogdeniya',
										`gragdanstvo`='$gragdanstvo' WHERE id_avtor='$id_avtor'");
					$sql = mysql_query($query);
				}
				else
				{
					$name = $_POST[name];
					$family = $_POST[family];
					$otchestvo = $_POST[otchestvo];
					$biografiya = $_POST[biografiya];
					$date_insert = date('Y-m-d');
					if(isset($_FILES) && $_FILES['foto']['error'] == 0)
					{ 
						$file_name = basename($_FILES['foto']['name']);
						$destiation_dir = ('C:/OSPanel/domains/kursovoy/files/avtors/').$file_name;
						$tmp_dir = $_FILES['foto']['tmp_name'];
						copy($tmp_dir, $destiation_dir); 
					}
					$foto = "/files/avtors"."/".$file_name;
					$date_rogdeniya = $_POST[date_rogdeniya];
					$gragdanstvo = $_POST[gragdanstvo];
					$query = ("INSERT INTO `avtors`(`id_avtor`, `name`, `family`,
								`otchestvo`, `biografiya`, `date_insert`,
								`foto`, `date_rogdeniya`, `gragdanstvo`) 
								VALUES ('NULL','$name','$family',
										'$otchestvo','$biografiya','$date_insert',
										'$foto','$date_rogdeniya','$gragdanstvo')");
					$sql = mysql_query($query);
				}
				$tablebd ='avtor';
			}
			else if (isset($_POST[booksinsert]))
			{
				if (isset($_POST[id_book]))
				{
				$name_book = $_POST[name_book];
				$annotaciya = $_POST[annotaciya];
				$ganr = $_POST[ganr];
				$seriya = $_POST[seriya];
				$lang_book = $_POST[lang_book];
				$count_sheat = $_POST[count_sheat];
				$vosrast_kategory = $_POST[vosrast_kategory];
				$format_books = $_POST[format_books];
				$id_avtor = $_POST[id_avtor];
				$reyting = $_POST[reyting];
				$date_insert = date('Y-m-d');
				$status_book = $_POST[status_book];
				$date_pechati = $_POST[date_pechati];
				$num_book_seriya = $_POST[num_book_seriya];
				$query = ("UPDATE `books` SET `name_book`='$name_book',
											`annotaciya`='$annotaciya',`ganr`='$ganr',`seriya`='$seriya',
											`lang_book`='$lang_book',`count_sheat`='$count_sheat',
											`vosrast_kategory`='$vosrast_kategory',`format_books`='$format_books',
											`id_avtor`='$id_avtor',`reyting`='$reyting',
											`status_book`='$status_book',`date_pechati`='$date_pechati',
											`num_book_seriya`='$num_book_seriya' WHERE id_book='$id_book'");
				$sql = mysql_query($query);
				}
				else 
				{
				$name_book = $_POST[name_book];
				$annotaciya = $_POST[annotaciya];
				$ganr = $_POST[ganr];
				$seriya = $_POST[seriya];
				$lang_book = $_POST[lang_book];
				$count_sheat = $_POST[count_sheat];
				if(isset($_FILES) && $_FILES['put']['error'] == 0)
				{ 
					$file_name = basename($_FILES['put']['name']);
					$destiation_dir = ('C:/OSPanel/domains/kursovoy/read_book/books/').$file_name;
					$tmp_dir = $_FILES['put']['tmp_name'];
					copy($tmp_dir, $destiation_dir); 
				}
				$put = "./books"."/".$file_name;
				$vosrast_kategory = $_POST[vosrast_kategory];
				$format_books = $_POST[format_books];
				if(isset($_FILES) && $_FILES['obl']['error'] == 0)
				{ 
					$file_name = basename($_FILES['obl']['name']);
					$destiation_dir = ('C:/OSPanel/domains/kursovoy/read_book/books/obl/').$file_name;
					$tmp_dir = $_FILES['obl']['tmp_name'];
					copy($tmp_dir, $destiation_dir); 
				}
				$obl = "/read_book/books/obl"."/".$file_name;
				$id_avtor = $_POST[id_avtor];
				$reyting = $_POST[reyting];
				$date_insert = date('Y-m-d');
				$status_book = $_POST[status_book];
				$date_pechati = $_POST[date_pechati];
				$num_book_seriya = $_POST[num_book_seriya];
				$query = ("INSERT INTO `books`(`id_book`, `name_book`, `izdatelstvo`, `annotaciya`,
												`ganr`, `seriya`, `lang_book`, `count_sheat`, `put`,
												`vosrast_kategory`, `format_books`, `obl`, `id_avtor`, 
												`reyting`, `date_insert`, `status_book`,
												`date_pechati`, `num_book_seriya`) VALUES 
												('NULL','$name_book','','$annotaciya',
												'$ganr','$seriya','$lang_book','$count_sheat','$put',
												'$vosrast_kategory','$format_books','$obl','$id_avtor',
												'$reyting','$date_insert','$status_book',
												'$date_pechati','$num_book_seriya')");
				$sql = mysql_query($query);
				}
				$tablebd ='books';
			}
			else if (isset($_POST[seriesinsert]))
			{
				$id_seriya = $_POST[id_seriya];
				$name_seriya = $_POST[name_seriya];
				$avtor = $_POST[avtor];
				$query = ("INSERT INTO `series`(`id_seriya`, `name_seriya`, `avtor`) 
							VALUES ('$id_seriya','$name_seriya','$avtor')");
				$sql = mysql_query($query);
				$tablebd ='series';
			}
			else if (isset($_POST[class_usersinsert]))
			{
				$name_class = $_POST[name_class];
				$count_priv = $_POST[count_priv];
				$query = ("INSERT INTO `class_users`(`id_class`, `name_class`, `count_priv`) 
							VALUES ('NULL', '$name_class', '$count_priv')");
				$sql = mysql_query($query);
				$tablebd ='class_users';
			}
			else if (isset($_POST[ganrinsert]))
			{
				$name_ganr = $_POST[name_ganr];
				$annotaciya = $_POST[annotaciya];
				$type_klassification = $_POST[type_klassification];
				$query = ("INSERT INTO `ganr`(`id_ganr`, `name_ganr`, `annotaciya`, `type_klassification`) 
										VALUES ('NULL','$name_ganr','$annotaciya','$type_klassification')");
				$sql = mysql_query($query);
				$tablebd ='ganr';
			}
			else if (isset($_POST[type_klassificationinsert]))
			{
				$klassification = $_POST[klassification];
				$query = ("INSERT INTO `type_klassification`(`id_type`, `klassification`) 
								VALUES ('NULL','$type_klassification')");
				$sql = mysql_query($query);
				$tablebd ='type_klassification';
			}
			else if (isset($_POST[REGinsert]))
			{
				$EMAIL = $_POST[EMAIL];
				$query = ("UPDATE `REG` SET`id_class`='$id_class' WHERE EMAIL = '$EMAIL'");
				$sql = mysql_query($query);
				$tablebd ='REG';
			}
			else if (isset($_POST[avtorselect]))
			{
				$name = $_POST[name];
				$family = $_POST[family];
				$otchestvo = $_POST[otchestvo];
				$query = ("SELECT * FROM avtors 
						WHERE name LIKE '$name' OR family LIKE '$family' 
						OR otchestvo LIKE '$otchestvo'");
				$sql = mysql_query($query);
				while ($row = mysql_fetch_array($sql))
				{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Имя";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='name' value='$row[name]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Фамилия";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='family' value='$row[family]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Отчество";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='otchestvo' value='$row[otchestvo]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Биография";
							echo"</td>";
							echo"<td>";
								echo"<TEXTAREA class='inputlk' name='biografiya'>$row[biografiya]</TEXTAREA>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Фотография";
							echo"</td>";
							echo"<td>";
								echo"<input type='file' class='inputlk' name='foto' value='$row[foto]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Дата рождения";
							echo"</td>";
							echo"<td>";
								echo"<input type='date' class='inputlk' name='date_rogdeniya' value='$row[date_rogdeniya]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Гражданство";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='gragdanstvo' value='$row[gragdanstvo]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='hidden' name='id_avtor' value='$row[id_avtor]' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='avtorselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='avtorinsert' value='Добавить\Обновить' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='avtordelete' value='Удалить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
				}
			}
			else if (isset($_POST[booksselect]))
			{
				$name_book = $_POST[name_book];
				$query = ("SELECT * FROM books 
						WHERE name_book LIKE '%$name_book%' ");
				$sql = mysql_query($query);
				while ($row = mysql_fetch_array($sql))
				{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Название";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='name_book' value='$row[name_book]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Аннотация";
							echo"</td>";
							echo"<td>";
								echo"<TEXTAREA class='inputlk' name='annotaciya'>$row[annotaciya]</TEXTAREA>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Жанр";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='ganr' value='$row[ganr]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Серия";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='seriya' value='$row[seriya]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Язык";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='lang_book' value='$row[lang_book]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Количество страниц";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='count_sheat' value='$row[count_sheat]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Файл";
							echo"</td>";
							echo"<td>";
								echo"<input type='file' class='inputlk' name='put' value='$row[put]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Возрастная категория";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='vosrast_kategory' value='$row[vosrast_kategory]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Формат файла";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='format_books' value='$row[format_books]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Обложка";
							echo"</td>";
							echo"<td>";
								echo"<input type='file' class='inputlk' name='obl' value='$row[obl]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Автор";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='id_avtor' value='$row[id_avtor]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Рейтинг";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='reyting' value='$row[reyting]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Статус книги";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='status_book' value='$row[status_book]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Дата печати";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='date_pechati' value='$row[date_pechati]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Номер в серии";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='num_book_seriya' value='$row[num_book_seriya]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='hidden' name='id_book' value='$row[id_book]' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='booksselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='booksinsert' value='Добавить\Обновить' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='booksdelete' value='Удалить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
				}
			}
			else if (isset($_POST[seriesselect]))
			{
				$id_seriya = $_POST[id_seriya];
				$name_seriya = $_POST[name_seriya];
				$avtor = $_POST[avtor];
				$query = ("SELECT * FROM series 
						WHERE id_seriya LIKE '$id_seriya' OR name_seriya LIKE '$name_seriya' 
						OR avtor LIKE '$avtor'");
				$sql = mysql_query($query);
				while ($row = mysql_fetch_array($sql))
				{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Код серии";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='id_seriya' value='$row[id_seriya]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Название серии";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='name_seriya' value='$row[name_seriya]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Автор серии";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='avtor' value='$row[avtor]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='seriesselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='seriesinsert' value='Добавить\Обновить' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='seriesdelete' value='Удалить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
				}
			}
			else if (isset($_POST[class_usersselect]))
			{
				$name_class = $_POST[name_class];
				$count_priv = $_POST[count_priv];
				$query = ("SELECT * FROM class_users 
						WHERE name_class LIKE '$name_class' OR count_priv LIKE '$count_priv'");
				$sql = mysql_query($query);
				while ($row = mysql_fetch_array($sql))
				{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Название класса";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='name_class' value='$row[name_class]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Количество привилегий";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='count_priv' value='$row[count_priv]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='hidden' name='id_class' value='$row[id_class]' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='class_usersselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='class_usersinsert' value='Добавить\Обновить' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='class_usersdelete' value='Удалить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
				}
			}
			else if (isset($_POST[ganrselect]))
			{
				$name_ganr = $_POST[name_ganr];
				$annotaciya = $_POST[annotaciya];
				$type_klassification = $_POST[type_klassification];
				$query = ("SELECT * FROM ganr 
						WHERE name_ganr LIKE '$name_ganr' OR annotaciya LIKE '$annotaciya' 
						OR type_klassification LIKE '$type_klassification'");
				$sql = mysql_query($query);
				while ($row = mysql_fetch_array($sql))
				{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Название жанра";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='name_ganr' value='$name_ganr'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Аннотация";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='annotaciya' value='$annotaciya'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Классификация";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='type_klassification' value='$type_klassification'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='hidden' name='id_ganr' value='$row[id_ganr]' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='ganrselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='ganrinsert' value='Добавить\Обновить' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='ganrdelete' value='Удалить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
				}
			}
			else if (isset($_POST[type_klassificationselect]))
			{
				$klassification = $_POST[klassification];
				$query = ("SELECT * FROM type_klassification 
						WHERE klassification LIKE '$klassification'");
				$sql = mysql_query($query);
				while ($row = mysql_fetch_array($sql))
				{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Классификация";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='klassification' value='$row[klassification]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='hidden' name='id_type' value='$row[id_type]' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='type_klassificationselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='type_klassificationinsert' value='Добавить\Обновить' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='type_klassificationdelete' value='Удалить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
				}
			}
			else if (isset($_POST[REGselect]))
			{
				$EMAIL = $_POST[EMAIL];
				$query = ("SELECT * FROM REG 
						WHERE EMAIL LIKE '$EMAIL'");
				$sql = mysql_query($query);
				while ($row = mysql_fetch_array($sql))
				{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"E-mail пользователя";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='EMAIL' value='$row[EMAIL]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Класс пользователя";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='id_class' value='$row[EMAIL]'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='hidden' name='ID' value='$row[ID]' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='REGselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='REGupdate' value='Присвоить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
				}
			}
			else if (isset($_POST[avtordelete]))
			{ 	
				$id_avtor = $_POST[id_avtor];
				$query = ("DELETE FROM `avtors` WHERE id_avtor = '$id_avtor'");
				$sql = mysql_query($query);
				$tablebd = 'avtors';
			}
			else if (isset($_POST[booksdelete]))
			{
				$id_book = $_POST[id_book];
				$query = ("DELETE FROM `books` WHERE id_book = '$id_book'");
				$sql = mysql_query($query);
				$tablebd ='books';
			}
			else if (isset($_POST[seriesdelete]))
			{
				$id_seriya = $_POST[id_seriya];
				$query = ("DELETE FROM `series` WHERE id_seriya = '$id_seriya'");
				$sql = mysql_query($query);
				$tablebd ='series';
			}
			else if (isset($_POST[class_usersdelete]))
			{
				$id_class = $_POST[id_class];
				$query = ("DELETE FROM `class_users` WHERE id_class = '$id_class'");
				$sql = mysql_query($query);
				$tablebd ='class_users';
			}
			else if (isset($_POST[ganrdelete]))
			{
				$id_ganr = $_POST[id_ganr];
				$query = ("DELETE FROM `ganr` WHERE id_ganr = '$id_ganr'");
				$sql = mysql_query($query);
				$tablebd ='ganr';
			}
			else if (isset($_POST[type_klassificationdelete]))
			{
				$id_type = $_POST[id_type];
				$query = ("DELETE FROM `type_klassification` WHERE id_type = '$id_type'");
				$sql = mysql_query($query);
				$tablebd ='type_klassification';
			}
			else if ($tablebd == 'avtors')
			{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Имя";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='name'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Фамилия";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='family'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Отчество";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='otchestvo'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Биография";
							echo"</td>";
							echo"<td>";
								echo"<TEXTAREA class='inputlk' name='biografiya'></TEXTAREA>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Фотография";
							echo"</td>";
							echo"<td>";
								echo"<input type='file' class='inputlk' name='foto'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Дата рождения";
							echo"</td>";
							echo"<td>";
								echo"<input type='date' class='inputlk' name='date_rogdeniya'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Гражданство";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='gragdanstvo'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='avtorselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='avtorinsert' value='Добавить\Обновить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
			}
			else if ($tablebd == 'books')
			{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Название";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='name_book'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Аннотация";
							echo"</td>";
							echo"<td>";
								echo"<TEXTAREA class='inputlk' name='annotaciya'></TEXTAREA>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Жанр";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='ganr'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Серия";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='seriya'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Язык";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='lang_book'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Количество страниц";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='count_sheat'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Файл";
							echo"</td>";
							echo"<td>";
								echo"<input type='file' class='inputlk' name='put'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Возрастная категория";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='vosrast_kategory'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Формат файла";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='format_books'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Обложка";
							echo"</td>";
							echo"<td>";
								echo"<input type='file' class='inputlk' name='obl'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Автор";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='id_avtor'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Рейтинг";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='reyting'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Статус книги";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='status_book'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Дата печати";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='date_pechati'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Номер в серии";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='num_book_seriya'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='booksselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='booksinsert' value='Добавить\Обновить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
			}
			else if ($tablebd == 'series')
			{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Код серии";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='id_seriya'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Название серии";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='name_seriya'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Автор серии";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='avtor'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='seriesselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='seriesinsert' value='Добавить\Обновить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
			}
			else if ($tablebd == 'class_users')
			{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Название класса";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='name_class'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Количество привилегий";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='count_priv'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='class_usersselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='class_usersinsert' value='Добавить\Обновить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
			}
			else if ($tablebd == 'ganr')
			{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Название жанра";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='name_ganr'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Аннотация";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='annotaciya'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Классификация";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='type_klassification'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='ganrselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='ganrinsert' value='Добавить\Обновить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
			}
			else if ($tablebd == 'type_klassification')
			{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"Классификация";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='klassification'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='type_klassificationselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='type_klassificationinsert' value='Добавить\Обновить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
			}
			else if ($tablebd == 'REG')
			{
				echo"<form action='adminpan.php' method='post'>";
					echo"<table class='tablelk'>";
						echo"<tr>";
							echo"<td>";
								echo"E-mail пользователя";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='EMAIL'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td>";
								echo"Класс пользователя";
							echo"</td>";
							echo"<td>";
								echo"<input type='text' class='inputlk' name='id_class'>";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='REGselect' value='Найти' >";
							echo"</td>";
						echo"</tr>";
						echo"<tr>";
							echo"<td colspan='2'>";
								echo"<input type='submit' class='spisbutton' name='REGupdate' value='Присвоить' >";
							echo"</td>";
						echo"</tr>";
					echo"</table>";
				echo"</form>";
			}
			else 
			{
				echo"<form class='spisadminpan' action='adminpan.php' method='POST'>";
					echo"<input type='hidden' name='tablebd' value='avtors'>";
					echo"<input type='submit' class='spisbutton' value='Авторы'>";
				echo"</form>";
				echo"<form class='spisadminpan' action='adminpan.php' method='POST'>";
					echo"<input type='hidden' name='tablebd' value='books'>";
					echo"<input type='submit' class='spisbutton' value='Книги'>";
				echo"</form>";
				echo"<form class='spisadminpan' action='adminpan.php' method='POST'>";
					echo"<input type='hidden' name='tablebd' value='series'>";
					echo"<input type='submit' class='spisbutton' value='Литературные серии'>";
				echo"</form>";
				echo"<form class='spisadminpan' action='adminpan.php' method='POST'>";
					echo"<input type='hidden' name='tablebd' value='class_users'>";
					echo"<input type='submit' class='spisbutton' value='Классы пользователей'>";
				echo"</form>";
				echo"<form class='spisadminpan' action='adminpan.php' method='POST'>";
					echo"<input type='hidden' name='tablebd' value='ganr'>";
					echo"<input type='submit' class='spisbutton' value='Жанры'>";
				echo"</form>";
				echo"<form class='spisadminpan' action='adminpan.php' method='POST'>";
					echo"<input type='hidden' name='tablebd' value='type_klassification'>";
					echo"<input type='submit' class='spisbutton' value='Классификации жанров'>";
				echo"</form>";
				$query_adm = ("SELECT REG.*, class_users.* FROM REG, class_users 
								WHERE REG.id_class=class_users.id_class AND ID = '$_SESSION[ID]'");
				$sql_adm = mysql_query($query_adm);
				$row_adm = mysql_fetch_array($sql_adm);
				if ($row_adm[count_priv]==10)
				{
				echo"<form class='spisadminpan' action='adminpan.php' method='POST'>";
					echo"<input type='hidden' name='tablebd' value='REG'>";
					echo"<input type='submit' class='spisbutton' value='Пользователи'>";
				echo"</form>";
				}
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