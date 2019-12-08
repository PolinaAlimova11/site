<html>
	<head>
		<meta charset="uft-8">
		<link rel="stylesheet" href="style.css">
		<title>Регистрация</title>
	</head>
	<body>
	<div id="zero">
		<div id="two">
			<img style ="max-width: 100%" src="sould.png" alt="logo">
		</div>
		<div id="three">
			<a href="main.html"><div id="three-one"><p>главная</p></div></a>
			<a href="gallery.php"><div id="three-two"><p>галерея</p></div></a>
			<a href="comm.html"><div id="three-three"><p>комментарии</p></div></a>
			<a href="back.php"><div id="three-foor"><p>профиль</p></div></a>
		</div>
		
		<div id="foor" style="height:250;">
<?php
		$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
		$pass1 = filter_var(trim($_POST['pass1']), FILTER_SANITIZE_STRING);
		$pass2 = filter_var(trim($_POST['pass2']), FILTER_SANITIZE_STRING);
		$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
		$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
		//проверяем корректность записи *нужно добавить это сообщение на страницу
	
		if ($login != NULL && 
		strlen($login)>=6 && 
		preg_match('/^[a-zA-Z][a-zA-Z0-9_]*$/', $login)) 
	{
		echo "";
	}
		else
		{
			echo "<h2>Логин введён некорректно</h2>";
		exit();
		}
	if ($email != NULL &&
		preg_match('/[0-9a-z]+@[a-z]+[.][a-z]/', $email))
		{
			echo "";
		}
		else
		{
			echo "<h2>Email введён некорректно</h2>";
			exit();
		}
	if ($pass1 != NULL &&
		strlen($pass1)>=8 &&
		preg_match('![\%\$\#\@\&\*\^\|\\\/\~\[\]\{\}]!', $pass1) &&
		preg_match('![a-z]!', $pass1) &&
		preg_match('![A-Z]!', $pass1) &&
		preg_match('![0-9]!', $pass1) &&
		($pass1 == $pass2))
		{
			echo "";
		}
		else
		{
			echo "<h2>Пароль введён некорректно</h2>";
			exit();
		}
		
		
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");//подключение к базе данных
	if (!$mysql) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
  }
	mysqli_query('SET NAMES utf8');//кодировка на всякий случай
	
	 $resultlp = mysqli_query($mysql, "SELECT * FROM `user` WHERE `login`='$login' AND `pass`='$pass'")
			or die("Invalid query: " . mysqli_error());
		$user = mysqli_fetch_assoc($resultlp);//сохраняем массив из логина и пароля
	 if(isset($user)) {//есть ли значения
		 if($login == $user['login'] AND $pass == $user['pass']) {
			session_start();//
			$_SESSION['status'] = $user['status'];//сохраняем статус
			$_SESSION['name'] = $user['name'];//сохраняем имя
			header("location: back.php");//направляем на главную
			exit;
		 }
		 else {
			 echo 'Не корректно';
		 }
	 }
		else {
			echo 'No';
		}
		mysqli_free_result($resultlp);
		mysqli_close($mysql);//РАБОТАЕТ 

?>
		<br><p>Уже зарегистрирован? <a href="input.html">Войти</a></p><br>
		<p>Ещё не зарегистрирован? <a href="reg.html">Зарегистрироваться</a></p>
</div>
		
		<div id="fife">
		<p>&#9993 polina.alimova@mail.ru</p>
		<a class="a2" href="https://vk.com/pol_all">VK</p>
		</div>
	</div>
	</body>
</html>'
