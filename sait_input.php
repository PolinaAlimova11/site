<?php
	if (isset ($_POST['login'])) {
		$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);//валидация
	}
	if (isset ($_POST['pass'])) {
		$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
		$pass=md5($pass."vvuhub789");
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
