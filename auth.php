<?php


session_start();

# ПОЛУЧЕНИЕ И ФИЛЬТРАЦИЯ ДАННЫХ POST

$post = array(
'login' => FILTER_SANITIZE_SPECIAL_CHARS,
'password' => array(
	'filter' => FILTER_VALIDATE_REGEXP,
	'options' => array('default' => 'novalid',
	'regexp' => '@^[0-9A-z!#№%:^?*()_\-+={}[\\]><,.~`]+$@')) ); # не должно быть $ ; & | \n \t \s

	if ($user_input = filter_input_array(INPUT_POST,$post)) {
		
		/*выбросить ошибку если пользователь начнёт отправлять запрещенные символы*/
		
		if($user_input['password'] === 'novalid') {header("HTTP/1.1 400 Bad Request"); die;}
			
# ПОДКЛЮЧЕНИЕ К БД MYSQL
	
		$mysqli = mysqli_connect('127.0.0.1','root','gkake!R4J','dbweb');

# ПРОВЕРЯЕМ СОЕДИНЕНИЕ
			if (mysqli_connect_errno()) {
				echo "Соединение не удалось. Текст ошибки: ".mysqli_connect_error();
				die;
			}
# ДЕЛАЕМ ЗАПРОС К БАЗЕ ДАННЫХ
		     /*	подготовливаем запрос */
			 $sqlprepare = mysqli_prepare($mysqli,"SELECT login,password FROM accounts WHERE login = ? and password = ?");
			 
			 /*связываем данные с запросом*/
			 mysqli_stmt_bind_param($sqlprepare,'ss',$user_input['login'],$user_input['password']);
			 
			 /*отправляем запрос*/
			 mysqli_stmt_execute($sqlprepare);
			 
			 /*получаем результат в виде объекта mysqli_result*/
			$msqlresult = mysqli_stmt_get_result($sqlprepare);
			 
			 if (mysqli_num_rows($msqlresult)) {

				 $_SESSION['LOGIN'] = $user_input['login'];
				 $_SESSION['PASSWORD'] = $user_input['password'];
				 
				 header('Location: main.php');
				 die; /*здесь необходимо будет перенаправить пользователя*/
			 }
			 else {
				 $_SESSION['noauthorized'] = true;
				header('Location: index.php'); /*здесь необходимо будет перенаправить пользователя обратно*/
				die;
			 }
	}
	else {
			die('Непредвиденная проблема');
	}


?>
