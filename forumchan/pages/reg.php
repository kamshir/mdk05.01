<!DOCTYPE>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="keywords" content="site">
	<meta name="description" content="site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Регистрация</title>
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
				<h1 class="ttl">Регистрация</h1>
				<form action="" id="form">
					<div class="inp">
						<p class="holder">Логин:</p>
						<input type="text" name="name">
					</div>
					<div class="inp">
						<p class="holder">Почта:</p>
						<input type="email" name="email" pattern="*@gmail.com">
					</div>
					<div class="inp">
						<p class="holder">Пароль:</p>
						<input type="password" name="password">
					</div>
					<div class="inp">
						<p class="holder">Повторите пароль:</p>
						<input type="password" name="password">
					</div>
					<div class="inp check">
						<div class="block_check">
							<input type="checkbox" name="agreement" id="check">
							<label for="check" class="agreement">Нажимая на галочку, вы соглашайтесь с правилами конфиденциальности</label>
						</div>
					</div>
					<div class="sub">
						<input type="submit" name='send' value='Регистрация' id='reg'>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="js/script.js"></script>
</body>
</html>