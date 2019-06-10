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
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>Восстановление пароля</title>
</head>
<body>
	<div class="cd-user-modal is-visible"> <!-- все формы на фоне затемнения-->
		<div class="cd-user-modal-container"> <!-- основной контейнер -->
			<ul class="cd-switcher">
				<li><a href="login.php">Вход</a></li>
				<li><a href="registration.php">Регистрация</a></li>
			</ul>

			<div id="cd-reset-password is-visible"> <!-- форма восстановления пароля -->
				<p class="cd-form-message">Забыли пароль? Пожалуйста, введите адрес своей электронной почты. Вы получите ссылку, чтобы создать новый пароль.</p>

				<form class="cd-form" action="php/autorisation_registration.php" method="POST">
					<p class="fieldset">
						<label class="image-replace cd-email" for="reset-email">E-mail</label>
						<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
					</p>

					<p class="fieldset">
						<input class="full-width has-padding" type="submit" value="Восстановить пароль" name="password">
					</p>
				</form>

				<p class="cd-form-bottom-message"><a href="login.php">Вернуться к входу</a></p>
			</div> <!-- cd-reset-password -->
		</div> <!-- cd-user-modal-container -->
	</div> <!-- cd-user-modal -->
</body>
</html>