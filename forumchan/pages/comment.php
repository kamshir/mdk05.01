<?php 
	session_start();
	if (isset($_POST)){
		if (!empty($_POST['theme']) || !empty($_POST['text']) || !empty($_POST['theme_mess'])){

			$sql = new mysqli('localhost', 'root', '', 'forumchan');
			if ($sql->connect_error) die('Ошибка подключения');

			$sql->set_charset("utf8");
			$theme = $_POST['theme'];
			$res = $sql->query("SELECT `id_theme` FROM `themes` WHERE `title` = '$theme' LIMIT 1");
			if ($res->num_rows){
				$row = $res->fetch_assoc();
				// Данные
				$id_theme = $row['id_theme'];
				$id_user = $_SESSION['id_user'];
				$title = $_POST['theme_mess'];
				$text = $_POST['text'];
				$time = date("Y-m-d H:i:s");

				$sql->query("INSERT INTO `message`(`id_theme`, `id_user`, `title`, `time`, `text`) VALUES ($id_theme, $id_user, '$title', '$time', '$text')");

				header("Location: discuss.php?theme=$theme");
				
				$id_mess = $sql->query("SELECT `id_message` FROM `message` WHERE `id_theme` = '$id_theme' ORDER BY `id_message` DESC LIMIT 1");
				if ($id_mess->num_rows){
					$id_res = $id_mess->fetch_assoc();

					if (!empty($_FILES['photo'])){
						$names = array();
						$tmp = array();
						$id_message = $id_res['id_message'];
						if (count($_FILES['photo']['name']) == 1){
							$f_name = $_FILES['photo']['name'][0];
							$f_tmp = $_FILES['photo']['tmp_name'][0];
							move_uploaded_file($f_tmp, '../files/' . $f_name);
							$sql->query("INSERT INTO `files`(`url`, `id_message`) VALUES ('$f_name', '$id_message')");
						}
						else if (count($_FILES['photo']['name']) > 1) {
							foreach ($_FILES['photo'] as $key => $value) {
								if ($key == 'tmp_name'){
									foreach ($value as $key => $val) {
										$tmp[] = $val;
									}
								}
								if ($key == 'name'){
									foreach ($value as $key => $val) {
										$names[] = $val;
									}
								}
							}
							for ($i = 0; $i < count($names); $i++){
								move_uploaded_file($tmp[$i], '../files/' . $names[$i]);
								$sql->query("INSERT INTO `files`(`url`, `id_message`) VALUES ('$names[$i]', '$id_message')");
							}
						}
					}
				}
			}
		}
	}
 ?>