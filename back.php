<html>
	<head>
		<meta charset="uft-8">
		<link rel="stylesheet" href="style.css">
		<title>Профиль</title>
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
		
		<div id="foor">
		<p class="p4">Здесь информация о пользователе, когда он заходит</p>
		<?php
			session_start();
			if (isset($_SESSION['name'])and $_SESSION['status']=='adm'):
			?>
			<h3>Hello, adm <?=$_SESSION['name']?>.</h3>
			<h3>Добавление работы</h3>
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
				</select><br>
				<p>Иконка</p>
				<input type="file" name="img_min" placeholder="Иконка"><br>
				<p>Изображение</p>
				<input type="file" name="img_max" placeholder="Изображение"><br>
				<input type="submit" name="sub" value="Сохранить"><br>
			</form>
			<a href="exit.php">Выход</a>
			<?php 
			elseif (isset($_SESSION['name'])and $_SESSION['status']=='user'):?>
			<h3>Hello, user <?=$_SESSION['name']?>. </h3>
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
