<?php
session_start();
if (isset($_SESSION['LOGIN']) && isset($_SESSION['PASSWORD'])) {
	header('Location: main.php');
}
?>

<html>
	<head>
		<meta charset="utf-8">
		<link rel ="stylesheet" type="text/css" href="сss/default.css">
		<link rel ="stylesheet" type="text/css" href="сss/style.css">
		<title>Авторизация</title>
	</head>

	<body>

		<div class = "container_form">
			<h1>Вход</h1>
			
			<?php
			if (isset($_SESSION['noauthorized'])) : ?>
 <div style="text-align: center; color: #da5252ff">неверный логин или пароль</div>
 <?php
endif;
unset($_SESSION['noauthorized']);
 ?>
			
			<form action="auth.php" method="post">
				<label for="login">Логин</label>
				<input type="text" id='login' name="login" placeholder="Введите логин" required/>
				<label style="margin-top: 20px" for = "password">Пароль</label>
				<input style="margin-bottom: 20px" type="password" id='password' name="password" placeholder="Введите пароль" required/>
				<button type="submit">войти</button>

				<div class="container_form_link">
					<small>У вас нет аккаунта?</small>
					-
					<a href="registration.php">Регистрация</a>
				</div>
			</form>
		</div>

	</body>

</html>

<!--
mysql> show columns from accounts;
+----------+-------------------+------+-----+---------+----------------+
| Field    | Type              | Null | Key | Default | Extra          |
+----------+-------------------+------+-----+---------+----------------+
| id       | smallint unsigned | NO   | PRI | NULL    | auto_increment |
| login    | varchar(30)       | YES  |     | NULL    |                |
| password | varchar(30)       | YES  |     | NULL    |                |
| name     | varchar(60)       | YES  |     | NULL    |                |
| number   | bigint            | YES  |     | NULL    |                |
+----------+-------------------+------+-----+---------+----------------+
5 rows in set (0.04 sec)
 -->
