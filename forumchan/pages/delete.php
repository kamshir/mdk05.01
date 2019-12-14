<?php 
	if (!empty($_GET['id_mess'])){
		$sql = new mysqli('localhost', 'root', '', 'forumchan');
		if ($sql->connect_error) die ('Ошибка подключения!');

		$sql->set_charset("utf8");
		$id = $_GET['id_mess'];
		$theme = $_GET['theme'];
		$sql->query("DELETE FROM `files` WHERE `id_message` = $id");
		$sql->query("DELETE FROM `message` WHERE `id_message` = $id");
		header("Location: discuss.php?theme=$theme");
	}
 ?>