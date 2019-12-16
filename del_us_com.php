<?php
	session_start();
	if (isset($_SESSION['name'])and $_SESSION['status']=='adm') {
		$id= $_POST['id_del'];
		$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
		mysql_query('SET NAMES utf8');
		$sql = mysqli_query($mysql, "DELETE FROM `user_com` WHERE `id_us` = '$id'");
	}
	header("Location: /main.php");
	exit();

	?>
