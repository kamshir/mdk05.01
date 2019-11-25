<!DOCTYPE>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="keywords" content="site">
	<meta name="description" content="site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Вход на сайт</title>
	<link rel="icon" href="/forumchan/img/Forumchan.png">
	<link rel="stylesheet" href="../css/null.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/form.css">
</head>
<body>
	<div class="main_block">
		<header class="header">
			<!-- navigation -->
			<nav class="panel">
				<a href="../index.php"><h1 class="logo">Forumchan</h1></a>
			</nav>
		</header>

		<div class="block_form">
			<div class="form">
				<h1 class="ttl">Авторизация</h1>
				<form action="" id="form">
					<div class="inp">
						<p class="holder">Логин:</p>
						<input type="text" name="name" placeholder="Логин, почта">
					</div>
					<div class="inp">
						<p class="holder">Пароль:</p>
						<input type="password" name="password" placeholder="Ваш пароль">
					</div>
					<div class="sub">
						<input type="submit" name='send' value='Войти' id='send'>
						<p class="anway"><a href="reg.php">или зарегистрироваться</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="/forumchan/js/check.js"></script>
</body>
</html>