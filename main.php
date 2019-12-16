<?php
	session_start();
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
	if (!$mysql) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit();
		}
	mysql_query('SET NAMES utf8');
	$sql = mysqli_query($mysql, "SELECT * FROM `user_com`");
?>
<html>
	<head>
		<meta charset="uft-8">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<title>SoulD- художник современности</title>
		<link rel="shortcut icon" href="glav.jpg" type="image/jpg">
	</head>
	<body>
	<div id="zero">
		<div id="one">
			<a class="a1 "href="reg.html">Регистрация</a>
				<a class="a1 "href="input.html">Вход</a>
		</div>
		
		<div id="two">
			<img style ="max-width: 100%;"src="sould.png" alt="logo">
		</div>
		
		<div id="three">
			<a href="main.php"><div id="three-one"><p>главная</p></div></a>
			<a href="gallery.php"><div id="three-two"><p>галерея</p></div></a>
			<a href="comm.php"><div id="three-three"><p>комментарии</p></div></a>
			<a href="back.php"><div id="three-foor"><p>профиль</p></div></a>
		</div>
		
		<div id="foor" style ="height: auto;">
		<p class="p4">"Эти серые стены, не имеющие ничего из одеяния. 
		Кое-где можно было заметить следы слоев оборванных обоев, 
		но трудно было понять даже цвет когда-то украшавших эту стену полотен: 
		слишком маленькие раздробленные куски, расползающиеся острыми осколками 
		почти у самого потолка, только и остались на отштукатуренных и уже 
		заплесневевших по углам стенах. Где-то прерывались вниз тонкие расщелины 
		трещин, представляющих из себя целую корневую систему, какую обычно 
		рисовали в различных ботанических книгах. Но всё же стены были серые, 
		сдавливающие и надвигающиеся, в итак маленькой комнате. Серый с вкраплениями 
		синего и холодного ужаса, зеленоватого отчаянья, желтоватого отвращения. 
		"</p>
		<br><br>
		<div style="display:inline-block; max-width: 50%;">
			<img style ="max-width: 90%; text-align:left;"src="avtor.jpg" alt="avtor">
			
		</div>
			<p>Своим делом  я занимаюсь <br>
			достаточно давно. И хотела бы поделиться <br>
			с Вами своим творчеством!</p>
		
		
		
			<div>
			<h3>Комментарии:</h3><br>
			<?php
				echo "<div>";
					while ($com = $sql->fetch_assoc()) {
							$id = $com['id_us'];
							$sqlus = mysqli_query($mysql, "SELECT * FROM `user` WHERE `id`='$id'")
								or die("Invalid query: " . mysqli_error());
							$user = mysqli_fetch_assoc($sqlus);
							echo $user['name'];
							echo '[';
							echo $user['login'];
							echo ']';
							if (isset($_SESSION['name'])and $_SESSION['status']=='adm'){
								echo '<form action="del_us_com.php" method="post">
						<input type="hidden" name="id_del" value="'. $id.'"/>
						<button class="btn btn-success" type="submit">Удалить</button>
						</form>';
							}
							echo "<br><div style='background-color: rgb(240,240,240); display: block; text-align:left;'>";
							echo $com['text'];
							echo '<br><br>';
							echo "Оценка: ";
							echo $com['love']; 
							echo "</div><br>";
					}					
				echo"</div><br>";
			?>
			</div>
		</div>
		
		<div id="fife" >
		<p>&#9993 polina.alimova@mail.ru</p>
		<a class="a2" href="https://vk.com/pol_all">VK</p>
		</div>
	</div>
	</body>
</html>
<?php
		mysqli_close($mysql);
?>
