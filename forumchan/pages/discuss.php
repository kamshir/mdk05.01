<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="keywords" content="site">
	<meta name="description" content="site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $_GET['theme'] ?></title>
	<link rel="icon" href="/forumchan/img/Forumchan.png">
	<link rel="stylesheet" href="../css/null.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/comments.css">
</head>
<body>

	<div class="main_block">
		<?php
			include_once('header.php');

			$count = 10;
			$page = 1;
			if (!empty($_GET['page'])){
				$page = intval($_GET['page']);
			}
			$start_limit = ($page - 1) * $count;

			$sql = new mysqli('localhost', 'root', '', 'forumchan');
			if ($sql->connect_error) die('Ошибка подключения!');
			$sql->set_charset("utf8");
			$theme = $_GET['theme'];
			$res = $sql->query("SELECT `users`.`id_user`, `users`.`login`, `message`.`id_message`, `message`.`id_theme`, `message`.`time`, `message`.`title`, `message`.`text` FROM `message` INNER JOIN `users` ON `message`.`id_user` = `users`.`id_user` WHERE `id_theme` IN(SELECT `id_theme` FROM `themes` WHERE `title` = '$theme') ORDER BY `time` DESC LIMIT $start_limit, $count");
			$cnt = $sql->query("SELECT `users`.`id_user`, `users`.`login`, `message`.`id_message`, `message`.`id_theme`, `message`.`time`, `message`.`title`, `message`.`text` FROM `message` INNER JOIN `users` ON `message`.`id_user` = `users`.`id_user` WHERE `id_theme` IN(SELECT `id_theme` FROM `themes` WHERE `title` = '$theme') ORDER BY `time` DESC");

			$pages = $cnt->num_rows;
			$count_pages = ceil($pages / $count);
		?>
		<div class="box_discuss">
			<p class="disc"><?= $theme ?></p>
			<div class="comments">
				<?php 
					while ($row = $res->fetch_assoc()){
				 ?>
				<div class="comment">
					<?php 
						$id_mess = $row['id_message'];
						$files = $sql->query("SELECT * from `message` INNER JOIN `files` ON `message`.`id_message` = `files`.`id_message` WHERE `message`.`id_message` = '$id_mess'");
						if ($row['login'] == $_SESSION['login']){
					 ?>
					 <div class="tools">
					 	<img src="/forumchan/img/pencil-edit-button.svg" class="tool edit" alt="edit" title='Редактировать'>
					 	<a href="delete.php?theme=<?= $_GET['theme'] ?>&id_mess=<?= $row['id_message'] ?>"><img src="/forumchan/img/rubbish-bin-delete-button.svg" class="tool delete" alt="delete" title='Удалить'></a>
					 </div>
					<?php 
						}
					 ?>
					<div class="who">
						<div class="ava">
							<?php 
								echo substr($row['login'], 0, 1);
							 ?>
						</div>
						<div class="data">
							<span class="name"><?= $row['login'] ?>,</span>
							<span class="time"><?= $row['time'] ?></span>
						</div>
					</div>
					<div class="theme">
						<p class="text_theme"><?= $row['title'] ?></p>
					</div>
					<div class="cmnt">
						<p class="text"><?= $row['text'] ?></p>
					</div>
					<div class="cmnt">
					<?php 
						if ($files->num_rows){	
							while ($fl = $files->fetch_assoc()){
								if ($fl['url'] != ''){
					?>
							<a class="file" href="../files/<?= $fl['url'] ?>" title="Скачать" download><?= $fl['url'] ?><img src="../img/download.svg" class="tool download" alt=""></a>
					<?php
								}
							}
						}
					?>
					</div>
				</div>
				<?php
						if ($row['login'] == $_SESSION['login']){
				 ?>
				<div class="edit_comnt">
					<form action="updateComment.php" method="POST">
						<div class="txt">
							<input name="theme_mess" placeholder="Тема:" class="theme_mess" value="<?= $row['title'] ?>">
						</div>
						<div class="txt">
							<textarea id="text" name="text" placeholder="Ваш комментарий:" required><?= $row['text'] ?></textarea>
						</div>
						<div class="sub">
							<input type="submit" value="Изменить комментарий" id="send">
						</div>
						<input type="hidden" name="id_message" value="<?= $row['id_message'] ?>">
						<input type="hidden" name="theme" value="<?= $_GET['theme'] ?>">
					</form>
				</div>
				<?php 
						}
					}
				 ?>
			</div>
			<div class="pagination">
				<?php 
					$c = 1;
					while ($c <= $count_pages){
						if ($page == $c){
				?>
					<a href="discuss.php?page=<?= $c ?>&theme=<?= $_GET['theme'] ?>" class="punct now"><?= $c ?></a>
				<?php
						}
						else {
				?>
					<a href="discuss.php?page=<?= $c ?>&theme=<?= $_GET['theme'] ?>" class="punct"><?= $c ?></a>
				<?php
						}
					$c++;
					}
				 ?>
			</div>
			<?php
				if (isset($_SESSION['login'])){
			?>
			<div class="addComment">
				<p class="ttl">Комментировать</p>
				<form action="comment.php" method="POST" enctype="multipart/form-data">
					<div class="txt">
						<input name="theme_mess" placeholder="Тема:" class="theme_mess">
					</div>
					<div class="txt">
						<textarea id="text" name="text" placeholder="Ваш комментарий:" required></textarea>
						<label for="file" class="lbl" title='Прикрепить файл'>
							<img class="tool attach" src="../img/icon.svg" alt="file">
							<p class="val"></p>
						</label>
						<input type="file" id="file" name="photo[]" multiple>
					</div>
					<div class="sub">
						<input type="submit" value="Добавить комментарий" id="send">
					</div>
					<input type="hidden" name="theme" value="<?= $_GET['theme'] ?>">
				</form>
			</div>
			<?php
				}
				else {
			?>
			<div class="blocked">Только зарегестрированные пользователи могут оставлять комментарии!</div>
			<?php
				}
			?>
		</div>
	</div>
	<script src="/forumchan/lib/jquery.js"></script>
	<script src="/forumchan/js/script.js"></script>
	<script src="/forumchan/js/check.js"></script>
</body>
</html>