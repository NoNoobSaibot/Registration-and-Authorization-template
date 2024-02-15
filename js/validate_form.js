/*
	Имя должно содержать символы (как латинские, так и кириллические) без пробелов или специальных символов
	Номер телефона не содержит алфаваит, спец символы, кроме (+,-) и не менее 10
*/

let input_username = document.getElementById('username');
let input_tel = document.getElementById('telephone');
let input_login = document.getElementById('login');
let input_password = document.getElementById('password');
let input_repeat_password = document.getElementById('repeat_password');

let span_username = document.getElementById('error_username');
let span_telephone = document.getElementById('error_tel');
let span_login = document.getElementById('error_login');
let span_password = document.getElementById('error_password');
let span_repeat_password = document.getElementById('error_repeat_password');


////////// ПРАВИЛА ДЛЯ ИМЕНИ/////////////////////
 input_username.addEventListener('input',()=>{

	let value = input_username.value;
	
	if(value.length === 0){
		span_username.textContent = "Поле не должно быть пустым";
	}else if(!(/^[0-9A-zА-я]+$/.test(value))){
		span_username.textContent = "Имя не должно содержать пробелы и специальные символы";
	}else if((/[\\/]/.test(value))){
		span_username.textContent = "Имя не должно содержать специальные символы";
	}
	else {
		span_username.textContent = null;
	}
	
});
	
////////// ПРАВИЛА ДЛЯ НОМЕРА ТЕЛЕФОНА/////////////////////
 input_tel.addEventListener('input',()=>{

	let value = input_tel.value;
	
	if(value.length === 0){
		span_telephone.textContent = "Поле не должно быть пустым";
	}else if(!(/^[0-9]{11}$/.test(value))){
		span_telephone.textContent = "Неверный формат номера телефона";
    }else {
		span_telephone.textContent = null;
	}

});

////////// ПРАВИЛА ДЛЯ ЛОГИНА/////////////////////
 input_login.addEventListener('input',()=>{

	let value = input_login.value;
	
	if(value.length === 0){
		span_login.textContent = "Поле не должно быть пустым";
	}else if(!(/^[[a-zA-Z0-9_]{3,100}$/.test(value))){
		span_login.textContent = "Логин должен содержать не менее 3 символов, а также символов латинского алфавита, цифры и нижний пробел";
    }else {
		span_login.textContent = null;
	}

});

////////// ПРАВИЛА ДЛЯ ПАРОЛЯ/////////////////////
 input_password.addEventListener('input',()=>{

	let value = input_password.value;
	
	if(value.length === 0){
		span_password.textContent = "Поле не должно быть пустым";
	}else if(!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/.test(value))){
		span_password.textContent = 'Пароль должен содержать от 6 до 20 символов, хотя бы одну цифру, одну строчную и одну заглавную букву';
    }else if(/[;$|&\n\t\s]+/.test(value)){
		span_password.textContent = 'Запрещено использовать такие символы как $|&; , а также символы пробела, переноса строки и табуляции';
	}
	else{
		span_password.textContent = null;
	}

});

////////// ПРАВИЛА ДЛЯ ПОВТОРНОГО ПАРОЛЯ/////////////////////
 input_repeat_password.addEventListener('input',()=>{

	let value = input_repeat_password.value;
	let value_password = input_password.value;
	
	if(value !== value_password){
		span_repeat_password.textContent = "Пароли не совпадают";
	}else{
		span_repeat_password.textContent = null;
	}

});

document.getElementById('_form').addEventListener('submit', event =>{
	
	let errors = document.getElementsByTagName('span');
	
	for (let value of errors){
		if(value.textContent !== ""){
			event.preventDefault();
			console.log("данные не будут отправлены");
		}else{
			console.log('данные сохранены');
		}
	}
});