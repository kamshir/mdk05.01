<?php
	session_start();
?>

<!DOCTYPE>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="keywords" content="site">
	<meta name="description" content="site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Кто уже приобрёл?</title>
	<link rel="stylesheet" href="../css/null.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/comments.css">
</head>
<body>

	<div class="main_block">
		<?php
			include_once('header.php');
		?>
		<div class="box_discuss">
			<p class="disc"><a href="theme-321.php">Red Dead Redemption II</a></p>
			<p class="ttl">Кто уже приобрёл?</p>
			<div class="comments">
				<div class="comment">
					<div class="who">
						<div class="ava">
							M
						</div>
						<div class="data">
							<span class="name">Maks,</span>
							<span class="time">Сегодня, 21:21 в 16:05</span>
						</div>
					</div>
					<div class="cmnt">
						<p class="text">Я купил неделю назад. Очень классная игра, советую купить за деньги, вы точно жалеть не будете.</p>
					</div>
				</div>
				<div class="comment">
					<div class="who">
						<div class="ava">
							M
						</div>
						<div class="data">
							<span class="name">Maks,</span>
							<span class="time">Сегодня, 21:21 в 16:05</span>
						</div>
					</div>
					<div class="cmnt">
						<p class="text">Я купил неделю назад. Очень классная игра, советую купить за деньги, вы точно жалеть не будете.</p>
					</div>
				</div>
				<div class="comment">
					<div class="who">
						<div class="ava">
							M
						</div>
						<div class="data">
							<span class="name">Maks,</span>
							<span class="time">Сегодня, 21:21 в 16:05</span>
						</div>
					</div>
					<div class="cmnt">
						<p class="text">Я купил неделю назад. Очень классная игра, советую купить за деньги, вы точно жалеть не будете.</p>
					</div>
				</div>
			</div>
			<?php
				if (isset($_SESSION)){
					echo '<div class="addComment">
								<p class="ttl">Комментировать</p>
								<form action="">
									<div class="txt">
										<textarea id="text" name="text" placeholder="Напишите,что вы думаете"></textarea>
									</div>
									<div class="sub">
										<input type="submit" name="send" value="Добавить комментарий" id="send">
									</div>
								</form>
							</div>';
				}
				else {
					echo '<div class="blocked">Только зарегестрированные пользователи могут оставлять комментарии!</div>';
				}
			?>
		</div>
	</div>
	<script src="/forumchan/js/script.js"></script>
</body>
</html>