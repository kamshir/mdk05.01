<?php 
	session_start();
	if (isset($_POST)){
		if (!empty($_POST['theme']) || !empty($_POST['text']) || !empty($_POST['theme_mess'])){

			$sql = new mysqli('localhost', 'root', '', 'forumchan');
			if ($sql->connect_error) die('Ошибка подключения');

			$sql->set_charset("utf8");

			$theme = $_POST['theme'];
			$id_mess = $_POST['id_message'];
			$title = $_POST['theme_mess'];
			$text = $_POST['text'];
			$time = date("Y-m-d H:i:s");
			$sql->query("UPDATE `message` SET `title` = '$title',`time` = '$time',`text` = '$text' WHERE `id_message` = '$id_mess'");
			header("Location: discuss.php?theme=$theme");
		}
	}
 ?>