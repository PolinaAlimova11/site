<?php
	$nameimg = filter_var(trim($_POST['nameimg']), FILTER_SANITIZE_STRING);
	$type = filter_var(trim($_POST['type']), FILTER_SANITIZE_STRING);	
	$deser = filter_var(trim($_POST['deser']), FILTER_SANITIZE_STRING);
	$data = filter_var(trim($_POST['data']), FILTER_SANITIZE_STRING);
	//$imag_min = $_FILES['img_min']['name'];
	//$imag_max = $_FILES['img_max']['name'];
	$img_min = addslashes(file_get_contents($_FILES['img_min']['tmp_name']));
	$img_max = addslashes(file_get_contents($_FILES['img_max']['tmp_name']));
	//$img_min = filter_var(trim($_POST['img_min']), FILTER_SANITIZE_STRING);
	//$img_max = filter_var(trim($_POST['img_max']), FILTER_SANITIZE_STRING);
	//$folder="/image/";
	//move_uploaded_file($_FILES[" img_min "][" tmp_name "],"$folder".$_FILES[" img_min "][" name "]);
	//move_uploaded_file($_FILES[" img_max "][" tmp_name "],"$folder".$_FILES[" img_max "][" name "]);
	
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
	mysql_query('SET NAMES utf8');
	$result = mysqli_query($mysql, "INSERT INTO `imag` ( `name`, `type`,`deser`, `data`, `img_min`, `img_max`) 
	VALUES ( '$nameimg','$type', '$deser', '$data', '$img_min', '$img_max')")
			or die("Invalid query: " . mysqli_error());
		
	mysqli_close($mysql);
	
	header('Location: /back.php');
	exit();

	?>
