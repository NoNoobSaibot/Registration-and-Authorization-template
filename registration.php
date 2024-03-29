<html>
<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
	<script defer src="js/validate_form.js"></script>
	<link rel ="stylesheet" type="text/css" href="сss/default.css">
	<link rel ="stylesheet" type="text/css" href="сss/style.css">
</head>
<body>
	<div class="container_form">
	<h1>Регистрация</h1>
		<form style="width: 350px" action="datasend.php" id="_form" method="post">
			<label for="username">Имя пользователя</label>
			<input id="username" name="uname" type="text" placeholder="Имя*" required></input>
			<span id="error_username"></span>
			<label for="telephone">Номер телефона</label>
			<input id="telephone" name="number" type="tel" placeholder="Например: 89998887722" required></input>
			<span id="error_tel"></span>
			<label for="login">Логин</label>
			<input id="login" name="login" type="text" placeholder="Введите логин" maxlength="60" required></input>
			<span id="error_login"></span>
			<label for="password">Пароль</label>
			<input id="password" name="password" type="password" placeholder="Введите пароль" maxlength="30" required></input>
			<span id="error_password"></span>
			<label for="password">Повторите пароль</label>
			<input id="repeat_password" type="password" placeholder="Введите пароль" required></input>
			<span id="error_repeat_password"></span>
		</form>
		<div class="btns_registration">
			<button onclick="window.location.replace('index.php')">назад</button>
			<button id="btn_save" form="_form" type="submit">сохранить</button>
		</div>
		
	</div>
</body>
</html>
