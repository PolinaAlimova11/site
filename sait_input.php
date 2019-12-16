<html>
	<head>
		<meta charset="uft-8">
		<link rel="stylesheet" href="style.css">
		<title>Авторизация</title>
			<link rel="shortcut icon" href="glav.jpg" type="image/jpg">
	</head>
	<body>
	<div id="zero">
		<div id="two">
			<img style ="max-width: 100%" src="sould.png" alt="logo">
		</div>
		<div id="three">
			<a href="main.php"><div id="three-one"><p>главная</p></div></a>
			<a href="gallery.php"><div id="three-two"><p>галерея</p></div></a>
			<a href="comm.php"><div id="three-three"><p>комментарии</p></div></a>
			<a href="back.php"><div id="three-foor"><p>профиль</p></div></a>
		</div>
		<div id="foor" style="height:250;">
			<div class="reg" >
<?php
		$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);//валидация
		$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
		$pass=md5($pass."vvuhub789");
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");//подключение к базе данных
	if (!$mysql) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
  }
	mysqli_query('SET NAMES utf8');//кодировка на всякий случай
	
	 $resultlp = mysqli_query($mysql, "SELECT * FROM `user` WHERE `login`='$login'")
			or die("Invalid query: " . mysqli_error());
		$user = mysqli_fetch_assoc($resultlp);//сохраняем массив из логина и пароля
	 if(isset($user)) {//есть ли значения
		 if($login == $user['login'] AND $pass == $user['pass']) {
			session_start();//
			$_SESSION['status'] = $user['status'];//сохраняем статус
			$_SESSION['name'] = $user['name'];//сохраняем имя
			$_SESSION['login'] = $user['login'];
			$_SESSION['id'] = $user['id'];
			header("location: back.php");//направляем на главную
			exit;
		 }
		 else {
			 echo 'Неправильный пароль, попробуйте снова';
			 echo '<br>';
			 echo '<a href="input.html">Вход</a>';
		 }
	 }
		else {
			echo 'Ужасно, Вы не разеристрированы. Попробуйте ввести логин и пароль снова<br>';
			echo '<a href="input.html">Вход</a>';
		}
		mysqli_free_result($resultlp);
		mysqli_close($mysql);//РАБОТАЕТ 
?>
</div>	
		</div>
		
		<div id="fife">
		<p>&#9993 polina.alimova@mail.ru</p>
		<a class="a2" href="https://vk.com/pol_all">VK</p>
		</div>
	</div>
	</body>
</html>
