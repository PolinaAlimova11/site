<?php 
session_start();
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
	if (!$mysql) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit();
		}
	mysql_query('SET NAMES utf8');
	$id_img = $_POST['id_img'];
	$nam= $_POST['nam'];
			if ($_POST["nameimg"]!=='') {
				$nameimg = filter_var(trim($_POST['nameimg']), FILTER_SANITIZE_STRING);
				$sql = mysqli_query($mysql, "UPDATE `imag` SET `name` = '$nameimg' WHERE `id`='$id_img'");
			}
			if ($_FILES['img_min']['tmp_name']!=='') {
				$img_min = addslashes(file_get_contents($_FILES['img_min']['tmp_name']));
				$sql = mysqli_query($mysql, "UPDATE `imag` SET `img_min` = '$img_min' WHERE `id`='$id_img'");
			}
			if ($_FILES['img_max']['tmp_name']!=='') {
				$img_max = addslashes(file_get_contents($_FILES['img_max']['tmp_name']));
				$sql = mysqli_query($mysql, "UPDATE `imag` SET `img_max` = '$img_max' WHERE `id`='$id_img'");
			}
			if ($_POST['data']!=='') {
				$data = filter_var(trim($_POST['data']), FILTER_SANITIZE_STRING);
				
				$sql = mysqli_query($mysql, "UPDATE `imag` SET `data` = '$data' WHERE `id`='$id_img'")
					or die("Invalid query: " . mysqli_error());
			}
			if ($_POST['type']!=='') {
				$type = filter_var(trim($_POST['type']), FILTER_SANITIZE_STRING);
				$sql = mysqli_query($mysql, "UPDATE `imag` SET `type` = '$type' WHERE `id`='$id_img'");
			}
			if ($_POST['deser']!=='') {
				$deser = filter_var(trim($_POST['deser']), FILTER_SANITIZE_STRING);
				$sql = mysqli_query($mysql, "UPDATE `imag` SET `deser` = '$deser' WHERE `id`='$id_img'");
			}
		 //mysqli_free_result($sql);
	mysqli_close($mysql);
	header("Location: /gallery.php?page=$nam#ok$id_img");
	exit();
?>
