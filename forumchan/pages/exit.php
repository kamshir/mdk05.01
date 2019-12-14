<?php 
	session_start();
	if (isset($_POST['exit'])){
		unset($_SESSION['login']);
		unset($_SESSION['email']);
		session_destroy();
		header('Location: enter.php');
	}
 ?>