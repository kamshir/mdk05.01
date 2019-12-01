<?php 
	session_start();
	// Если пользователь вышел из сайта
	if (isset($_POST['exit'])){
		session_destroy();
		unset($_SESSION);
	}

	$db = new mysqli('localhost', 'root', '', 'testphp');
	if ($db->connenct_error){
		die('Ошибка подключения!');
	}
	$db->set_charset("utf8");

	// reg
	$errors = array();
	if (isset($_POST) && !empty($_POST)){
		$var = $_POST;
		if (isset($_POST['send'])){
			if ($var['name'] == ''){
				$errors[] = 'Введите логин!';
			}

			if ($var['email'] == ''){
				$errors[] = 'Введите почту!';
			}

			if ($var['password'] == ''){
				$errors[] = 'Задайте пароль!';
			}

			if ($var['password_repeat'] == ''){
				$errors[] = 'Повторите пароль!';
			}

			if ($var['password'] != $var['password_repeat']){
				$errors[] = 'Пароли не совпадают!';
			}

			if (!$var['agreement']){
				$errors[] = 'Подтвердите соглашение!';
			}

			// database
			$chk = $db->query("SELECT `login`, `password`, `email`, `phone` FROM `users`");
			$flag1 = false;
			$flag2 = false;
			$flag3 = false;

			// Проверяет, есть ли уже данные в базе данных
			while ($row = $chk->fetch_assoc()){
				if ($row['login'] == $var['name']) $flag1 = true;
				if ($row['email'] == $var['email']) $flag2 = true;
				if ($row['phone'] == $var['phone'] && $var['phone'] != null) $flag3 = true;
			}

			if ($flag1) $errors[] = 'Пользователь с таким логином уже зарегистрирован!';
			if ($flag2) $errors[] = 'Пользователь с таким email\'ом уже зарегистрирован!';
			if ($flag3) $errors[] = 'Пользователь с таким телефоном уже зарегистрирован!';

			if (empty($errors) && isset($_POST['send'])){
				$_SESSION['login'] = $var['name'];
				$_SESSION['email'] = $var['email'];

				// Запись данных в файл
				$data = "Login: " . $_SESSION['login'] . "\nPassword: " . $_POST['password'];
				$new = file_get_contents('../db/data.txt') . "\n\n" . $data;
				file_put_contents('../db/data.txt', $new);

				// Прогоняет данные для устранения ненужных символов
				$login = htmlspecialchars(trim(urldecode($var['name'])));
				$pass = md5(htmlspecialchars(trim(urldecode($var['password']))));
				$mail = htmlspecialchars(trim(urldecode($var['email'])));

				if ($var['phone'] == '') $phone = null;
				else $phone = $var['phone'];

				// Запись данных в базу
				$db->query("INSERT INTO `users` (`login`, `password`, `phone`, `active`, `email`) VALUES ('$login', '$pass', '$phone', 0, '$mail')");

				echo '<link rel="icon" href="/forumchan/img/Forumchan.png">';
				echo "<title>Успешная регистрация</title>";
				echo '<h3 class="success" style="text-align: center;color: seagreen;">Вы успешно зарегистрированы! Можете перейти на сайт!</h3>';
				die('<div style="display: flex; justify-content: center;"><a href="../index.php" style="color: #fff; text-align: center; text-decoration: none; padding: 10px 15px; border-radius: 5px; background-color: seagreen;">Перейти на сайт</a></div>');
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
	<title>Регистрация</title>
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
						if (!empty($errors) && isset($_POST['send'])) {
							echo array_shift($errors);
						}
					 ?>
				</p>
				<h1 class="ttl">Регистрация</h1>
				<form action="reg.php" id="form" method="POST">
					<div class="inp">
						<p class="holder important">Логин:</p>
						<input type="text" name="name" placeholder="Логин" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
					</div>
					<div class="inp">
						<p class="holder important">Почта:</p>
						<input type="email" name="email" pattern="*@gmail.com" placeholder="Почта" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
					</div>
					<div class="inp">
						<p class="holder">Телефон:</p>
						<input type="tel" name="phone" pattern="7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="7(924)-167-11-02" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
					</div>
					<div class="inp">
						<p class="holder important">Пароль:</p>
						<input type="password" name="password" placeholder="Пароль" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
					</div>
					<div class="inp">
						<p class="holder important">Повторите пароль:</p>
						<input type="password" name="password_repeat" placeholder="Повторите пароль" value="<?php if (isset($_POST['password_repeat'])) echo $_POST['password_repeat']; ?>">
					</div>
					<div class="inp check">
						<div class="block_check">
							<input type="checkbox" name="agreement" id="check">
							<label for="check" class="agreement">Нажимая на галочку, вы соглашайтесь с <strong class="rules">правилами конфиденциальности...</strong></label>
						</div>
					</div>
					<div class="sub">
						<input type="submit" name='send' value='Регистрация' id='reg'>
						<p class="anway enter"><a href="enter.php">или вход</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="/forumchan/js/check.js"></script>
</body>
</html>