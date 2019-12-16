<?php
	session_start();
	$comment = filter_var(trim($_POST['comment']), FILTER_SANITIZE_STRING);
	$id= $_POST['img_id'];
	$nam= $_POST['nam'];
	$name1=$_SESSION['name'];
	$us_losin=$_SESSION['login'];
		
	$folder="/gallery.php#ok$id";
	
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
	mysql_query('SET NAMES utf8');
	$result = mysqli_query($mysql, "INSERT INTO `comment` ( `name1`, `us_login`,`name2`, `comm`) 
	VALUES ( '$name1','$us_losin', '$id', '$comment')")
			or die("Invalid query: " . mysqli_error());
	mysqli_close($mysql);
	
	header("Location: /gallery.php?page=$nam#ok$id");
	exit();

	?>
