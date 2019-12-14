<?php 
	session_start();
	if (empty($_SESSION['login'])){
		header("Location: /forumchan/pages/enter.php");
	}
 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="keywords" content="site">
	<meta name="description" content="site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Forumchan</title>
	<link rel="icon" href="img/Forumchan.png">
	<link rel="stylesheet" href="css/null.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/themes.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="main_block">
		<?php
			include_once('pages/header.php');
		?>
		<!-- main page -->
			<!-- themes -->
			<div class="block__themes">

				<!-- main themes -->

				<section class="main__themes">
					<?php 
						$count = 10;
						$page = 1;
						if (!empty($_GET['page'])){
							$page = intval($_GET['page']);
						}
						$start_limit = ($page - 1) * $count;
						$base = new mysqli('localhost', 'root', '', 'forumchan');
						if ($base->connect_error){
							die('Ошибка подключения!');
						}
						$base->set_charset('utf8');
						$res = $base->query("SELECT `themes`.`id_theme`, `themes`.`title`, `themes`.`active`, `users`.`login` FROM `themes` INNER JOIN `users` ON `themes`.`id_user` = `users`.`id_user` ORDER BY `id_theme` DESC LIMIT $start_limit, $count");
						if ($res->num_rows){
					 ?>
					<h1 class="ttl">Темы форума</h1>
					<?php 
						$elems = $base->query("SELECT * FROM `themes`");
						$pages = $elems->num_rows;
						$count_pages = ceil($pages / $count);
						while ($ros = $res->fetch_assoc()){
							$date = '';
							$res_mess = $base->query("SELECT `users`.`id_user`, `users`.`login`, `message`.`id_theme`, `message`.`time` FROM `message` INNER JOIN `users` ON `message`.`id_user` = `users`.`id_user` WHERE `id_theme` = ".$ros['id_theme']." ORDER BY `time` DESC LIMIT 1");
							$mess = $res_mess->fetch_assoc();
							$date = $mess['time'];
							if ($ros['active']){
					 ?>
					<div class="theme">
						<div class="text">
							<a href="/forumchan/pages/discuss.php?theme=<?= $ros['title'] ?>" class='ser'></a>
							<p class="zagol"><?= $ros['title'] ?></p>
							<p class='author'>Автор: <strong class="name"><?= $ros['login'] ?></strong></p>
						</div>
							<div class="flag active"></div>
							<?php 
								if (!empty($mess['time'])){
							 ?>
							<div class="last_mess">
								Посл. <br> комментарий: <div class="icon"><?php echo substr($mess['login'], 0, 1) ?></div>
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
								<p class="time">Нет комментов!</p>
							</div>
							<?php
								}
							}
							else {
							 ?>
							 <div class="theme dont">
								<div class="text">
									<p class="zagol"><?= $ros['title'] ?></p>
									<p class='author'>Автор: <strong class="name"><?= $ros['login'] ?></strong></p>
								</div>
							 <div class="flag blocked"></div>
							<?php 
							}
							 ?>
					</div>
					<?php 
						}
					}
					 ?>
				</section>

				<div class="pagination">
					<?php 
						$c = 1;
						while ($c <= $count_pages){
							if ($page == $c){
					?>
						<a href="index.php?page=<?= $c ?>" class="punct now"><?= $c ?></a>
					<?php
							}
							else {
					?>
						<a href="index.php?page=<?= $c ?>" class="punct"><?= $c ?></a>
					<?php
							}
						$c++;
						}
					 ?>
				</div>
			</div>
			<?php
				include_once('pages/footer.php');
			?>
		</div>
		<script src="js/script.js"></script>
		<script src="js/check.js"></script>
</body>
</html>