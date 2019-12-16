<?php
	session_start();
	$text = filter_var(trim($_POST['obr']), FILTER_SANITIZE_STRING);
	$id= $_SESSION['id'];
	
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
	mysql_query('SET NAMES utf8');
	$result = mysqli_query($mysql, "INSERT INTO `pred` ( `id_us`,`text1`) 
	VALUES ( '$id', '$text')")
			or die("Invalid query: " . mysqli_error());
		
	mysqli_close($mysql);
	
	header("Location: /comm.php");
	exit();

	?>
