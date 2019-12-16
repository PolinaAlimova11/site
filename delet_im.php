<?php
	session_start();
	if (isset($_SESSION['name'])and $_SESSION['status']=='adm') {
		$id= $_POST['img_del'];
		$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
		mysql_query('SET NAMES utf8');
		$sql = mysqli_query($mysql, "DELETE FROM `imag` WHERE `id` = '$id'")
			or die("Invalid query: " . mysqli_error());
		$result2 = mysqli_query($mysql,"DELETE FROM `comment` WHERE `name2` = '$id'")
			or die("Invalid query: " . mysqli_error());
		$result3 = mysqli_query($mysql,"DELETE FROM `pain` WHERE `name2` = '$id'")
			or die("Invalid query: " . mysqli_error());
		mysqli_close($mysql);
	}
	header("Location: /gallery.php");
	exit();

	?>
