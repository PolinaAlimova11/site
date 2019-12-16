<?php
	session_start();
	$text = filter_var(trim($_POST['comment']), FILTER_SANITIZE_STRING);
	$id= $_SESSION['id'];
	$love = $_POST['love'];
	
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
	mysql_query('SET NAMES utf8');
	$result = mysqli_query($mysql, "INSERT INTO `user_com` ( `id_us`,`text`, `love`) 
	VALUES ( '$id', '$text', '$love')")
			or die("Invalid query: " . mysqli_error());
		
	mysqli_close($mysql);
	
	header("Location: /comm.php");
	exit();

	?>
