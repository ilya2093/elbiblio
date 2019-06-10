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
  	
	<title>Вход</title>
</head>
<body>
	<div class="cd-user-modal is-visible"> <!-- все формы на фоне затемнения-->
		<div class="cd-user-modal-container"> <!-- основной контейнер -->
			<ul class="cd-switcher">
				<li><a href="login.php">Вход</a></li>
				<li><a href="registration.php">Регистрация</a></li>
			</ul>

			<div id="cd-login is-visible"> <!-- форма входа -->
				<form class="cd-form" action="php/autorisation_registration.php" method="POST">
					<p class="fieldset">
						<label class="image-replace cd-email" for="signin-email" name="signin_email">E-mail</label>
						<input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail" name="email">
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signin-password">Пароль</label>
						<input class="full-width has-padding has-border" id="signin-password" type="text"  placeholder="Пароль" name="password">
					</p>

					<p class="fieldset">
						<input class="full-width" type="submit" value="Войти" name="autorisation">
					</p>
				</form>
				
				<p class="cd-form-bottom-message"><a href="password_vost.php">Забыли свой пароль?</a></p>
				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div> <!-- cd-login -->
		</div> <!-- cd-user-modal-container -->
	</div> <!-- cd-user-modal -->
</body>
</html>