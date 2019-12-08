<?php
	session_start();
	session_unset();
	 unset($_SESSION['name'],$_SESSION['status']);
	session_destroy();
	header('Location: main.html');
	?>
