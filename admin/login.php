<?php 
	include_once("config.php");
	if(!empty($_POST["login"]) && !empty($_POST["pass"])){
		if ($_POST["login"] == $login && $_POST["pass"] == $password) {
			setcookie("login", $_POST["login"]);
			setcookie("pass", $_POST["pass"]);
			header("Location:/admin");
		}
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styles/login.css">
	<title>Auth</title>
</head>
<body>
	<div class="container">
		<div class="window">
			<div class="window-label">
				Авторизация
			</div>
			<div class="window-inputs">
				<form method="post">
					<input type="" name="login" placeholder="Введите логин">
					<input type="password" name="pass" placeholder="Введите пароль">
					<button type="submit">Войти</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
