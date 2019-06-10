<?php
session_start();
include_once("php/bd.php");
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Gem style -->
  	
	<title>Регистрация</title>
</head>
<body>
	<div class="cd-user-modal is-visible"> <!-- все формы на фоне затемнения-->
		<div class="cd-user-modal-container"> <!-- основной контейнер -->
			<ul class="cd-switcher">
				<li><a href="login.php">Вход</a></li>
				<li><a href="registration.php">Регистрация</a></li>
			</ul>

			<div id="cd-signup is-visible"> <!-- форма регистрации -->
				<form class="cd-form" action="php/autorisation_registration.php" method="POST">
					<p class="fieldset">
						<input class="full-width has-padding has-border" id="signin-email" type="text" placeholder="Login" name="login">
					</p>

					<p class="fieldset">
						<input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail" name="email">
					</p>

					<p class="fieldset">
						<input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Пароль" name="password">
					</p>

					<p class="fieldset">
						<input class="full-width has-padding" type="submit" value="Создать аккаунт" name="registration">
					</p>
				</form>

				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div> <!-- cd-signup -->
		</div> <!-- cd-user-modal-container -->
	</div> <!-- cd-user-modal -->
</body>
</html>