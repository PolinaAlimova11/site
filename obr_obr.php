<?php
	session_start();
	$text = filter_var(trim($_POST['ans']), FILTER_SANITIZE_STRING);
	$id= $_POST['id_us'];
	
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
	mysql_query('SET NAMES utf8');
	$result = mysqli_query($mysql, "UPDATE `pred` SET `tex2` = '$text' WHERE `id_us`='$id'")
			or die("Invalid query: " . mysqli_error());
		
	mysqli_close($mysql);
	
	header("Location: /back.php");
	exit();

	?>
