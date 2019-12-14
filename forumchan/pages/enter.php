<?php 
	session_start();
	if (isset($_SESSION['id_user'])){
		header('Location: ../index.php');
	}
	// Поключение к базе данных
	$db = new mysqli('localhost', 'root', '', 'forumchan');
	if ($db->connenct_error){
		die('Ошибка подключения!');
	}
	$db->set_charset("utf8");

	$errors = array();
	if (isset($_POST) && !empty($_POST)){
		$var = $_POST;
		if (isset($_POST['send'])){

			if ($var['name'] == ''){
				$errors[] = 'Введите логин!';
			}

			if ($var['password'] == ''){
				$errors[] = 'Введите пароль!';
			}

			// database
			$chk = $db->query("SELECT `login`, `password`, `id_user`, `email` FROM `users`");
			$flag = false;
			// Проверка на наличие данных в базе
			while ($row = $chk->fetch_assoc()){
				if ($row['login'] == $var['name'] || $row['email'] == $var['name']){
					if ($row['password'] == md5($var['password'])){
						$flag = true;
						break;
					}
				}
			}

			if (!$flag) $errors[] = 'Неверные данные!';

			// Успешный вход на сайт
			if (empty($errors) && isset($_POST['send'])){
				$_SESSION['login'] = $row['login'];
				$_SESSION['id_user'] = $row['id_user'];
				header("Location: ../index.php");
			}
		}
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
				<p class="error">
					<?php 
						// Выводится первая ошибка из массива
						if (!empty($errors) && isset($_POST['send'])) {
							echo array_shift($errors);
						}
					 ?>
				</p>
				<h1 class="ttl">Авторизация</h1>
				<form action="enter.php" id="form" method="POST">
					<div class="inp">
						<p class="holder">Логин:</p>
						<input type="text" name="name" placeholder="Логин, почта"  value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
					</div>
					<div class="inp">
						<p class="holder">Пароль:</p>
						<input type="password" name="password" placeholder="Ваш пароль"  value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
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