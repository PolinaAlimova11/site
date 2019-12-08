<?php
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
	if (!$mysql) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit();
		}
	mysql_query('SET NAMES utf8');
	$sql = mysqli_query($mysql, "SELECT * FROM `imag`");
	$rows = $sql->num_rows;

?>
<html>
	<head>
		<meta charset="uft-8">
		<link rel="stylesheet" href="style.css">
		<title>Галерея Sould</title>
	</head>
	<body>
	<div id="zero">
		<div id="one">
			<a class="a1 "href="reg.html">Регистрация</a>
				<a class="a1 "href="input.html">Вход</a>
		</div>
		
		
		<div id="three">
			<a href="main.html"><div id="three-one"><p>главная</p></div></a>
			<a href="gallery.php"><div id="three-two"><p>галерея</p></div></a>
			<a href="comm.html"><div id="three-three"><p>комментарии</p></div></a>
			<a href="back.php"><div id="three-foor"><p>профиль</p></div></a>
		</div>
		
		<div id="foor" style="height: auto; min-height: 1000px;">
			
			<?php
				for($i = 1 ; $i <= $rows ; ++$i) {
				$sql = mysqli_query($mysql, "SELECT * FROM `imag` WHERE `id`='$i'");
				if(isset($sql)){
				$user1 = mysqli_fetch_assoc($sql);
				echo '<div style="height: auto;" class="cart"><a style="color: rgb(230,230,230);" href="#ok';
				echo $i;
				echo '">';
				echo $user1['name'];
				echo "<img src=\"data:image/jpg;base64,".base64_encode($user1['img_min'])."\" /><br>";
				echo '</div></a>';
				//'<a href="#ok">
				//'<div class="cart">
				//<img src=\"data:image/jpg;base64,'.base64_encode($user1['img_min']).'\' 
			//</div>';//</a>';
				echo '<div class="okno" id="ok';
				echo $i;
				echo '">
				<a href="#close" title="Закрыть" class="close">X</a>
				 <h2>';
				 echo $user1['name'];
				 echo '</h2>';
				 
				echo "<img style='width: 70%;' src=\"data:image/jpg;base64,".base64_encode($user1['img_max'])."\" /><br>";
				//<img style="width: 70%;  "src="2336.jpg" alt="img1">;
				
				echo '<br>
				<form action="ind.php" class="like" method="post">
					<button class="btn btn-success" type="submit">Мне нравится</button>
				</form>
				<br>
				<form action="comm_obr.php" method="post">
				<p><b>Введите ваш комментарий:</b></p> <br>
				<textarea name="comment" class="form1"></textarea> <br>
				<button class="btn btn-success" type="submit">Отправить</button>
				</form>
			</div>';
				}
				}
			?>
			<div class="okno" id="ok">
				<a href="#close" title="Закрыть" class="close">X</a>
				 <h2>Рисунок!</h2>
				<img style="width: 70%;  "src="2336.jpg" alt="img1">
				<br>
				<form action="ind.php" class="like" method="post">
					<button class="btn btn-success" type="submit">Мне нравится</button>
				</form>
				<br>
				<form action="comm_obr.php" method="post">
				<p><b>Введите ваш комментарий:</b></p> <br>
				<textarea name="comment" class="form1"></textarea> <br>
				<button class="btn btn-success" type="submit">Отправить</button>
				</form>
			</div>
		</div>
		
		<div id="fife">
		<p>&#9993 polina.alimova@mail.ru</p>
		<a class="a2" href="https://vk.com/pol_all">VK</p>
		</div>
	</div>
	</body>
</html>
<?php
	 //mysqli_free_result($sql);
	mysqli_close($mysql);
?>
