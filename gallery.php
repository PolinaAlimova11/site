<?php
	session_start();
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
	if (!$mysql) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit();
		}
	mysql_query('SET NAMES utf8');
	
?>
<html>
	<head>
		<meta charset="uft-8">
		<link rel="stylesheet" href="style.css">
		<title>Галерея Sould</title>
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
				$quantity=4;
				$limit=3;
				$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
				if ($page<1) $page=1;
				$result2 = mysqli_query($mysql,"SELECT * FROM `imag`");
				$num = mysqli_num_rows($result2);
				$pages = $num/$quantity;
				$pages = ceil($pages);
				$pages++; 
				if ($page>$pages) $page = 1;
				echo '<strong style="color: rgb(40,40,40);">Страница № ' . $page . 
				'</strong><br /><br />'; 
				if (!isset($list)) $list=0;
				$list=($page-1)*$quantity;
				$result = mysqli_query($mysql, "SELECT * FROM `imag`
                      LIMIT $quantity OFFSET $list");
				$num_result = mysqli_num_rows($result);
				for ($i = 0; $i<$num_result; $i++) {
						//маленький блок
						$user1 = $result->fetch_assoc();
						echo '<div style="height: auto;" class="cart"><a style="color: rgb(230,230,230);" href="#ok';
						$user_id=$user1['id'];
						//echo $user1['id'];
						echo $user_id;
						echo '">';
						echo $user1['name'];
						echo "<img src=\"data:image/jpg;base64,".base64_encode($user1['img_min'])."\" /><br>";
						echo '</div></a>';
						//конец маленького блока
						//большой блок
						echo '<div class="okno" id="ok';
						echo $user1['id'];//НАКАТИТЬ НОРМАЛЬНЫЙ СТИЛЬ
						echo '">';
						//РЕДАКТИРОВАТЬ
						if (isset($_SESSION['name'])and ($_SESSION['status']=='adm' )) {
						echo '<form action="red.php" class="like" method="post">
						<input type="hidden" name="red" value="';
						echo $user_id;
						
						echo'" />';
						echo '<input type="hidden" name="nam" value="';
							echo $page;
							echo '"/>
						<button style="background-color: rgb(150,150,150);;"class="btn btn-success" type="submit">Редактировать</button>
						</form>';
						}
						echo '<a href="#close" title="Закрыть" class="close">X</a>
						<h2>';
						echo $user1['name'];
						echo '</h2><br>';
				 
						echo "<img style='width: 70%;' src=\"data:image/jpg;base64,".base64_encode($user1['img_max'])."\" /><br><br>";
						//мне нравится кнопка
						if (isset($_SESSION['name'])and ($_SESSION['status']=='adm' or $_SESSION['status']=='user')) {
							echo '<form action="like.php" class="like" method="post">
							<input type="hidden" name="like_id" value="'.$user_id .'" />';
							echo '<input type="hidden" name="nam" value="';
							echo $page;
							echo '"/>
							</p><button class="btn btn-success" type="submit">Мне нравится ';
							echo $user1['nrav'] .'</button>
							</form>';
						}
						else {
							echo 'Мне нравится ';
							echo $user1['nrav'];
						}
						//конец кнопки
						
						echo "<p style=' text-align: center;'>";
						echo $user1['data'];
						echo ' ';
						echo $user1['type'];
						echo "</p>";
						echo '<p>';
						echo $user1['deser'];
						echo '</p>';
						//
						//начало блока комментариев
						//
						$sql2 = mysqli_query($mysql, "SELECT * FROM `comment`");
						echo '<br><h3>Комментарии</h3><br>';
						echo'<div style="display: block; overflow: auto; color: rgb(30,30,30); background-color: rgb(220,220,220); width: 70%; height: 200px; padding: 10px; margin-left: 15%;">';
							while ($uscom = $sql2->fetch_assoc()) {
									if ($uscom['name2']==$user1['id']) {
										echo $uscom['name1'];
										echo '[';
										echo $uscom['us_login'];
										echo ']';
										echo "<br><div style='background-color: rgb(240,240,240); display: block; text-align:left;'>";
										echo $uscom['comm'];
										echo "</div><br>";									 
									}
								}					
						echo'</div><br>';
								//комментарий добавить
						if (isset($_SESSION['name'])and ($_SESSION['status']=='adm' or $_SESSION['status']=='user')) {		
							echo "<form action='com_obr.php' method='post'>
							<p><b>Введите ваш комментарий:</b></p> <br>
							<textarea style='height: 50px; width: 70%;' name='comment' class='form1'></textarea> <br>
							<input type='hidden' name='img_id' value='";
							echo $user1['id'];
							echo "'/>
							<input type='hidden' name='nam' value='";
							echo $page;
							echo "'/>
							<button class='btn btn-success' type='submit'>Отправить</button>
							</form>";
						}
						//конец 
						echo "</div>";
						//конец большого блока
					
					}			

				//Тут адресация на другие страницы
				echo '<br>';
				echo 'Страницы: ';
				for ($j = 1; $j<$pages; $j++) {
						if ($j==($page)) {
							echo '<a href="gallery.php?page=' . $j . '"><strong style="color: rgb(40,40,40);">' . $j . '</strong></a> &nbsp; ';
						}
						 else echo '<a href="gallery.php?page=' . $j . '">' . $j . '</a> &nbsp; ';
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
