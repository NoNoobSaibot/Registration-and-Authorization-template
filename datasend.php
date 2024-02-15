<?php

# ПОЛУЧЕНИЕ И ФИЛЬТРАЦИЯ ДАННЫХ POST

$post = array(
'uname' => FILTER_SANITIZE_SPECIAL_CHARS,
'number' => FILTER_SANITIZE_NUMBER_INT,
'login' => FILTER_SANITIZE_SPECIAL_CHARS,
'password' => array(
	'filter' => FILTER_VALIDATE_REGEXP,
	'options' => array('default' => 'novalid',
	'regexp' => '/^[0-9A-z!#№%:^?*()_\-+={}[\\]><,.~`]+$/u')) ); # не должно быть $ ; & | \n \t \s
	
	if($user_input = filter_input_array(INPUT_POST,$post)){
		
		/*выбросить ошибку если пользователь начнёт отправлять запрещенные символы*/
		
		if($user_input['password'] === 'novalid') {header("HTTP/1.1 400 Bad Request"); die;}
		
 # ПОДКЛЮЧЕНИЕ К БД MYSQL
 
 	$mysqli = mysqli_connect('127.0.0.1','root','gkake!R4J','dbweb');
 
  	 if (mysqli_connect_errno()){
 		echo "Соединение не удалось. Текст ошибки: ".mysqli_connect_error();
		die;
		}
		
# ДЕЛАЕМ ЗАПРОСЫ К БАЗЕ ДАННЫХ

     /*подготавливаем запрос*/
    $sqlprepare = mysqli_prepare($mysqli,'SELECT login FROM accounts where login = ?');
    
    /*связываем данные с запросом*/
    mysqli_stmt_bind_param($sqlprepare,'s',$user_input['login']);
    
    /*отправляем запросом*/
    mysqli_stmt_execute($sqlprepare);
    
    /*получаем результат в виде объекта mysqli_result*/
    $msqlresult = mysqli_stmt_get_result($sqlprepare);
    
    
    /*если не найдено совпадение логина, то:*/
    if(!mysqli_num_rows($msqlresult)) {
	
		/*подготавливаем запрос*/
		$sqlprepare = mysqli_prepare($mysqli, "INSERT INTO accounts (login,password,name,number) values ( ?, ?, ?, ?);");
	
		/*связываем данные с запросом*/
	 	mysqli_stmt_bind_param($sqlprepare,'sssi',$user_input['login'],$user_input['password'],$user_input['uname'],$user_input['number']);
		 
		/*отправляем запросом*/
		mysqli_stmt_execute($sqlprepare);
	
	 	/*получаем результат в виде объекта mysqli_result*/
		$msqlresult = mysqli_stmt_get_result($sqlprepare);
	
		if(!($msqlresult))
	 		echo "Запись сохранена<br><a href='index.php'>вернуться назад</a>";
		else 
			echo "В результате сохранения произошла ошибка";
		}
	    else{
			die("Логин уже занят!<br><a href='registration.php'>вернуться назад</a>");
		}
  }
   else {
		die('Непредвиденная проблема');
		
}

?>