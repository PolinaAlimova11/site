<?php
	session_start();
	if (isset($_SESSION['name'])and $_SESSION['status']=='adm') {
		$id_us= $_POST['id_us'];
		$id_im = $_POST['id_im'];
		$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
		mysql_query('SET NAMES utf8');
		$sql = mysqli_query($mysql, "DELETE FROM `comment` WHERE `us_login` = '$id_us' AND `name2`='$id_im'");
		//	or die("Invalid query: " . mysqli_error());
		//$result2 = mysqli_query($mysql,"DELETE FROM `comment` WHERE `name2` = '$id'")
		//	or die("Invalid query: " . mysqli_error());
		//$result3 = mysqli_query($mysql,"DELETE FROM `pain` WHERE `name2` = '$id'")
		//	or die("Invalid query: " . mysqli_error());
		//mysqli_close($mysql);
	}
	header("Location: /gallery.php");
	exit();

	?>
