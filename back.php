<?php
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
		if (!$mysql) {
		echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
		exit();
	}
?>
<html>
	<head>
		<meta charset="uft-8">
		<link rel="stylesheet" href="style.css">
		<title>Профиль</title>
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
		
		<div id="foor" style ="min-height: 500; height: auto;">
		<?php
			session_start();
			if (isset($_SESSION['name'])and $_SESSION['status']=='adm'):
			//ADMIN
			?>
			
			<h3>Здравствуйте, администратор <?=$_SESSION['name']?>.</h3>
			<a href="exit.php">Выход</a>
			<h3>Добавление работы</h3><br>
			<form action="img_obr.php" method="post" enctype="multipart/form-data">
				<input type="text" name="nameimg"  placeholder="Название"><br>
				<select name="type" placeholder="Техника">
					<option >Акварель</option>
					<option >Графика</option>
					<option >Масло</option>
					<option >Компьютерная графика</option>
					<option >Скетч</option>
				</select><br>
				<textarea name="deser" placeholder="Описание" ></textarea> <br>
				<select name="data" placeholder="Год">
					<option >2020</option>
					<option >2019</option>
					<option >2018</option>
					<option >2017</option>
					<option >Раньше</option>
				</select><br><br>
				<p>Иконка</p><br>
				<input type="file" name="img_min" placeholder="Иконка"><br><br>
				<p>Изображение</p><br>
				<input type="file" name="img_max" placeholder="Изображение"><br><br>
				<input type="submit" name="sub" value="Сохранить"><br>
			</form><br>
			<h3>Список пользователей:</h3><br>
			<div style="display: block; overflow: auto; width: 100%; height: 200px; background-color: rgb(250,250,250);">
				<table style="width: 100%; height: 100px;">
					<tr>
						<td>Имя</td><td>Логин</td><td>Статус</td><td>Почта</td><td>Действие</td>
					</tr>
				<?php
					$sql= mysqli_query($mysql, "SELECT * FROM `user`");
					while ($user = $sql->fetch_assoc()) {
						$us_id=$user['id'];
						echo '<tr><td>'.$user['name']. '</td><td>'.$user['login']. '</td><td>'. $user['status'].'</td><td>'. $user['email'].'</td><td>
						<form action="delet_us.php" method="post">
						<input type="hidden" name="id_bl" value="'. $us_id.'"/>
						<button class="btn btn-success" type="submit">Блокировать/разблокировать</button>
						</form></td>
						<td>
						<form action="delet_us.php" method="post">
						<input type="hidden" name="id_del" value="'. $us_id.'"/>
						<button class="btn btn-success" type="submit">Удалить</button>
						</form></td></tr>';
					}
				
				?>
				</table>
				
			</div>
			<h3>Обратная связь:</h3><br>
				<div style="display: block; overflow: auto; width: 100%; height: 200px; background-color: rgb(250,250,250);">
					<?php
						$sqlcom= mysqli_query($mysql, "SELECT * FROM `pred`");
						while ($uscom = $sqlcom->fetch_assoc()) {
										$id_us = $uscom['id_us'];
										echo "<br><div style='background-color: rgb(240,240,240); display: block; text-align:left;'>";
										echo $uscom['text1'];
										echo $uscom['text2'];
										echo "</div><br>
										<form action='obr_obr.php' method='post' >
											<textarea name='ans' placeholder='Ответ' style='width: 90%; height: 50px;'></textarea> <br>
											<button class='btn btn-success' type='submit'>Отправить</button>
											<input type='hidden' name='id_us' value='".$id_us. "'/>
										</form>
										";
										
								}		
						
					?>
				</div>
			
			
			<?php //USER
			elseif (isset($_SESSION['name'])and $_SESSION['status']=='user'):?>
			<h3>Здравствуйте, пользователь <?=$_SESSION['name']?>. </h3><br>
			<a href="exit.php">Выход</a>
			<h3>Мои комментарии:</h3>
			<?php
				$id=$_SESSION['id'];
				$sql= mysqli_query($mysql, "SELECT * FROM `user_com` WHERE `id_us`='$id'");
					while ($us = $sql->fetch_assoc()) {
						echo $us['text'];
							echo '<br>';
						echo 'Оценка:';
						echo $us['love'];
					}
			echo '<h3>Мои предложения:</h3>';
				$sql= mysqli_query($mysql, "SELECT * FROM `pred` WHERE `id_us`='$id'");
					while ($us = $sql->fetch_assoc()) {
						echo $us['text1'];
						echo '<br>';
						echo 'Ответ:';
						echo $us['tex2'];
					}	
			?>
			<?php //BLOCK
			elseif (isset($_SESSION['name'])and $_SESSION['status']=='block'):?>
			<h3>Hello, user <?=$_SESSION['name']?>. </h3>
			<p>Вы заблокированы</p>
			<a href="exit.php">Выход</a>
			<?php 
			else:?>
			<p>Вы не авторизованы</p>
		<a href="input.html">Вход</a>
		<?php endif; ?>
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
