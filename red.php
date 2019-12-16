<?php
	session_start();
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
	if (!$mysql) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit();
		}
	mysql_query('SET NAMES utf8');
	$id_im = $_POST['red'];
	$nam= $_POST['nam'];
	$result = mysqli_query($mysql, "SELECT * FROM `imag` WHERE `id`='$id_im'");
	$imag = $result->fetch_assoc();
?>
<html>
	<head>
		<meta charset="uft-8">
		<link rel="stylesheet" href="style.css">
		<title>Редактирование</title>
			<link rel="shortcut icon" href="glav.jpg" type="image/jpg">
	</head>
	<body>
	<div id="zero">
		<div id="one">
			<a class="a1 "href="reg.html">Регистрация</a>
				<a class="a1 "href="input.html">Вход</a>
		</div>
		
		
		<div id="three">
			<a href="main.php"><div id="three-one"><p>главная</p></div></a>
			<a href="gallery.php"><div id="three-two"><p>галерея</p></div></a>
			<a href="comm.php"><div id="three-three"><p>комментарии</p></div></a>
			<a href="back.php"><div id="three-foor"><p>профиль</p></div></a>
		</div>
		
		<div id="foor" style="height: auto; min-height: 500px;">
			<?php
			if (isset($_SESSION['name'])and $_SESSION['status']=='adm'):			
			?>
			<h3>Редактирование<h3>
			<?php 
			echo "<form action='red2.php' method='post' enctype='multipart/form-data'>";
			echo "<h2>";
			echo $imag['name'];
			echo "</h2>
			<input type='text' name='nameimg'  placeholder='Название'><br><br>";
			echo '<h5>Иконка</h5>';	 
			echo "<img  src=\"data:image/jpg;base64,".base64_encode($imag['img_min'])."\" /><br><br>			
			<input type='file' name='img_min' placeholder='Иконка'><br><br>";
			echo '<h5>Изображение</h5>';	 
			echo "<img style='width: 40%;' src=\"data:image/jpg;base64,".base64_encode($imag['img_max'])."\" /><br><br>
			<input type='file' name='img_max' placeholder='Изображение'><br><br>";
			echo $imag['data'];
			echo '<input type="hidden" name="id_img" value="';
			echo $id_im;
			echo '"/>';
			echo '<input type="hidden" name="nam" value="';
			echo $nam;
			echo '"/><br>';
			echo "<select name='data' placeholder='Год'>
					<option >2020</option>
					<option >2019</option>
					<option >2018</option>
					<option >2017</option>
					<option >Раньше</option>
				</select><br><p>";
			echo $imag['type'];
			echo "</p><br><select name='type'>
					<option >Акварель</option>
					<option >Графика</option>
					<option >Масло</option>
					<option >Компьютерная графика</option>
					<option >Скетч</option>
				</select><br><br><h5>";
			echo $imag['deser'];
			echo "</h5><br><textarea name='deser' placeholder='Описание'></textarea> <br>";
			echo "
			<input type='submit' name='sub' value='Сохранить'><br>
			</form>
			<form action='delet_im.php' method='post'>
			<br><p>Удалить работу?</p>
			<input type='hidden' name='img_del' value='";
			echo $id_im;
			echo "'/>
			<button class='btn btn-success' type='submit'>Удалить</button>
			</form><br>";
			?>
			<h3>Комментарии:</h3>
			<div>
				<?php
					$sql2 = mysqli_query($mysql, "SELECT * FROM `comment` WHERE `name2`='$id_im'");
						echo'<div style="display: block; overflow: auto; color: rgb(30,30,30); background-color: rgb(220,220,220); width: 70%; height: 200px; padding: 10px; margin-left: 15%;">';
							while ($uscom = $sql2->fetch_assoc()) {
									
										echo $uscom['name1'] .'['. $uscom['us_login'] . ']';
										echo "<form action='com_del1.php' method='post'><input type='hidden' name='id_us' value='";
										echo $uscom['us_login'];
										echo "'/><input type='hidden' name='id_im' value='".$id_im. "'/>
										<button class='btn btn-success' type='submit'>Удалить</button>
										</form>";
										echo "<br><div style='background-color: rgb(240,240,240); display: block; text-align:left;'>";
										echo $uscom['comm'];
										echo "</div><br>";									 
									
								}					
						echo'</div><br>';
				?>
			</div>
			
			<?php endif; 
			?>
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
	//header('Location: /gallery.php?page=$nam#ok$id_im');
	exit();
?>
