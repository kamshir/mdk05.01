<?php 
	session_start();
	if (empty($_SESSION['login'])){
		header("Location: /forumchan/pages/enter.php");
	}
	if (empty($_GET['search'])) 
	header("Location: ../index.php");
 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="keywords" content="site">
	<meta name="description" content="site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Поиск на странице</title>
	<link rel="icon" href="img/Forumchan.png">
	<link rel="stylesheet" href="../css/null.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/footer.css">
	<link rel="stylesheet" href="../css/themes.css">
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<div class="main_block">
		<?php
			include_once('header.php');
		?>
		<!-- main page -->
			<!-- themes -->
			<div class="block__themes">
				<?php 
					if (!empty($_GET['search'])){
				 ?>
				<div class="what_find">
					<p class="search">Вы искали:<strong class="key"><?= $_GET['search'] ?></strong></p>
				</div>
				<?php 
					}
					$count = 10;
					$page = 1;
					if (!empty($_GET['page'])){
						$page = intval($_GET['page']);
					}
					$start_limit = ($page - 1) * $count;

					$sql = new mysqli('localhost', 'root', '', 'forumchan');
					if ($sql->connect_error) die('Ошибка');
					$sql->set_charset('utf8');

					$find = $_GET['search'];
					$cnt = $sql->query("SELECT `title` FROM `themes` WHERE `themes`.`title` LIKE '%$find%'");
					$res = $sql->query("SELECT `themes`.`id_theme`, `themes`.`title`, `themes`.`active`, `users`.`login` FROM `themes` INNER JOIN `users` ON `themes`.`id_user` = `users`.`id_user` WHERE `themes`.`title` LIKE '%$find%' ORDER BY `themes`.`title` LIMIT $start_limit, $count");
					$pages = $cnt->num_rows;
					$count_pages = ceil($pages / $count);
					while ($row = $res->fetch_assoc()){
						$date = '';
						$res_mess = $sql->query("SELECT `users`.`id_user`, `users`.`login`, `message`.`id_theme`, `message`.`time` FROM `message` INNER JOIN `users` ON `message`.`id_user` = `users`.`id_user` WHERE `id_theme` = ".$row['id_theme']." ORDER BY `time` DESC LIMIT 1");
						$mess = $res_mess->fetch_assoc();
						$date = $mess['time'];
						if ($row['active']){
				?>
				<div class="theme">
						<div class="text">
							<a href="/forumchan/pages/discuss.php?theme=<?= $row['title'] ?>" class='ser'></a>
							<p class="zagol"><?= $row['title'] ?></p>
							<p class='author'>Автор: <strong class="name"><?= $row['login'] ?></strong></p>
						</div>
							<div class="flag active"></div>
							<?php 
								if (!empty($mess['time'])){
							 ?>
							<div class="last_mess">
								Посл. <br> сообщение: <div class="icon"><?php echo substr($mess['login'], 0, 1) ?></div>
								<div class="data">
									<p class="time">Дата: <strong class="bld"><?= $date ?></strong></p>
									<p class="time">Автор: <strong class="bld"><?= $mess['login'] ?></strong></p>
								</div>
							</div>
							<?php 
								}
								else {
							?>
							<div class="last_mess">
								<p class="time">Нет сообщений!</p>
							</div>
							<?php
								}
							}
							else {
							 ?>
							 <div class="theme dont">
								<div class="text">
									<a class='ser'></a>
									<p class="zagol"><?= $row['title'] ?></p>
									<p class='author'>Автор: <strong class="name"><?= $row['login'] ?></strong></p>
								</div>
							 <div class="flag blocked"></div>
							<?php 
							}
							 ?>
					</div>
				<?php
					}
				 ?>
			</div>
				<div class="pagination">
					<?php 
						$c = 1;
						while ($c <= $count_pages){
							if ($page == $c){
					?>
						<a href="search.php?page=<?= $c ?>&search=<?= $_GET['search'] ?>" class="punct now"><?= $c ?></a>
					<?php
							}
							else {
					?>
						<a href="search.php?page=<?= $c ?>&search=<?= $_GET['search'] ?>" class="punct"><?= $c ?></a>
					<?php
							}
						$c++;
						}
					 ?>
				</div>
			<?php
				include_once('footer.php');
			?>
		</div>
		<script src="../js/script.js"></script>
</body>
</html>