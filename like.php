<?php
	session_start();
	$id=$_POST['like_id'];//id рисунка ROBIT
	$nam= $_POST['nam'];
	if (isset($_SESSION['name'])and $_SESSION['status']=='adm' or $_SESSION['status']=='user') {
		$name1=$_SESSION['name'];//Имя пользователя
		$login=$_SESSION['login'];//логин пользователя	
		$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users")
			or die("Invalid query: " . mysqli_error());
		mysql_query('SET NAMES utf8');
		$sql = mysqli_query($mysql, "SELECT * FROM `pain` WHERE `li_login`='$login' AND `name2`='$id'")
			or die("Invalid query: " . mysqli_error());
		$like = mysqli_fetch_assoc($sql);
	
		if ($like['like']=='1') {//если существует ПОЧЕМУ-ТО ЭТОТ ЗАПРОС СУЩЕСТВУЕТ
		echo 'Yes';
			 $sql = mysqli_query($mysql, "DELETE FROM `pain` WHERE `li_login` = '$login' AND `name2`='$id'");
				
		}
		else {
				$result = mysqli_query($mysql, "INSERT INTO `pain` ( `name1`, `li_login`,`name2`, `like`) VALUES ( '$name1','$login', '$id', '1')")
				or die("Invalid query: " . mysqli_error());//НЕ РОБИТ
			
		}
		$sql_like = mysqli_query($mysql, "SELECT * FROM `pain` WHERE `name2`='$id'");
			$num = mysqli_num_rows($sql_like);
		$sql_img = mysqli_query($mysql, "UPDATE `imag` SET `nrav` = '$num' WHERE `id`='$id'");
		mysqli_close($mysql);
	}
	header("Location: /gallery.php?page=$nam#ok$id");
	exit();

	?>
