<?php
session_start();

if (!isset($_SESSION['LOGIN']) && !isset($_SESSION['PASSWORD'])) :
	header("HTTP/1.1 403 Access denied");
	die();
    else:
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Главная страница</title>
	</head>
	<body>
		Добро пожаловать на сайт!<br>
		<a href="outaccount.php">выйти из учетной записи</a>
	</body>
</html>

<?php
endif;
?>
