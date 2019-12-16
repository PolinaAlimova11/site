<?php
	session_start();
?>
<html>
	<head>
		<meta charset="uft-8">
		<link rel="stylesheet" href="style.css">
		<title>Ваш комментарий</title>
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
		
		<div id="foor" style="text-align:left;">
		<?php
			if (isset($_SESSION['name'])and $_SESSION['status']=='adm' or $_SESSION['status']=='user'):
		?>
			<form action="us_com_obr.php" method="post">
			 <p><b>Введите ваш комментарий по поводу творчества SoulD:</b></p> <br>
			<textarea name="comment" class="form1" style="height: 100px;"></textarea> <br>
			<p><b>Оцените творчество:</b></p> <br>
			<select name="love" placeholder="Техника">
					<option >0</option>
					<option >1</option>
					<option >2</option>
					<option >3</option>
					<option >4</option>
					<option >5</option>
				</select><br><br>
			<button class="btn btn-success" type="submit">Отправить</button>
			</form>
			<br><br>
		<?php
			elseif (isset($_SESSION['name'])and $_SESSION['status']=='block'):
		?>
			<h5>Вы заблокированы. Обратитесь к администратору, для выяснения причины блокировки</h5>
		<?php 
			else:?>
			<h3>Для того, чтобы оставить комментарий, нужно авторизоваться</h3>
		<?php endif; ?>
		<?php
			if (isset($_SESSION['name'])and $_SESSION['status']=='adm' or $_SESSION['status']=='user'):
		?>
			<form action="pred_obr.php" method="post">
			 <p><b>Хотите что-то предложить? Сообщения автору:</b></p> <br>
			<textarea name="obr" class="form1" style="height: 100px;"></textarea> <br>
			<button class="btn btn-success" type="submit">Отправить</button>
			</form>
		<?php endif; ?>
		</div>
		
		<div id="fife">
		<p>&#9993 polina.alimova@mail.ru</p>
		<a class="a2" href="https://vk.com/pol_all">VK</p>
		</div>
	</div>
	</body>
</html>
