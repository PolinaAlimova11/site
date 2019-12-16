<?php
	session_start();
	$id_bl= $_POST['id_bl'];
	$id_del= $_POST['id_del'];
	if($_SESSION['status']=='adm') {
		$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
		mysql_query('SET NAMES utf8');
		if ($id_bl!==''){
			$res = mysqli_query($mysql, "SELECT * FROM `user` WHERE id='$id_bl'");
			$user = $res->fetch_assoc();
			if ($user['status']=='user') {
				$res1 = mysqli_query($mysql, "UPDATE `user` SET `status`= 'block' WHERE id='$id_bl'");
			}
			if ($user['status']=='block'){
				$res1 = mysqli_query($mysql, "UPDATE `user` SET `status`= 'user' WHERE id='$id_bl'");
			}
		}
		if ($id_del!==''){
			$res = mysqli_query($mysql, "SELECT `login` FROM `user` WHERE id='$id_del'");
			$user = $res->fetch_assoc();
			$login=$user['login'];
			$res1 = mysqli_query($mysql, "DELETE FROM `user` WHERE `id` = '$id_del'");
			$res2 = mysqli_query($mysql, "DELETE FROM `comment` WHERE `us_login` = '$login'");
			$res3 = mysqli_query($mysql, "DELETE FROM `pain` WHERE `li_login` = '$login'");
			$res4 = mysqli_query($mysql, "DELETE FROM `pred` WHERE `id_us` = '$id_del'");
			$res5 = mysqli_query($mysql, "DELETE FROM `user_com` WHERE `id_us` = '$id_del'");
		}
	
		mysqli_close($mysql);
	}
		header("Location: /back.php");
	exit();
	?>
