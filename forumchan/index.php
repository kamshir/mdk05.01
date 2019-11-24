<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="keywords" content="site">
	<meta name="description" content="site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Forumchan</title>
	<link rel="stylesheet" href="css/null.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/slider.css">
	<link rel="stylesheet" href="css/themes.css">
</head>
<body>
	<div class="main_block">
		<?php
			include_once('pages/header.php');
			include_once('pages/slider.php');
		?>
		<!-- main page -->
			<!-- themes -->
			<div class="block__themes">
				<h1 class="last_news">Свежее</h1>
				<div class="theme">
					<div class="text">
						<p class="zagol">"Джокер (2019)"</p>
						<p class="nadtext">Новый фильм от DC уже заслужил огромное внимание зрителей и критиков</p>
					</div>
					<div class="recently">
						<div class="people">
							<p class="answers">223 ответа</p>
						</div>
						<div class="who">
							<div class="ava">
								C
							</div>
							<div class="data">
								<p class="last">Посл. сообщение</p>
								<p class="name">Стас Антаносян</p>
								<p class="time">13.05.2019, 20:12</p>
							</div>
						</div>
					</div>
				</div>

				<div class="theme">
					<div class="text">
						<p class="zagol">"Обсуждение 4 сезона Рика и Морти"</p>
						<p class="nadtext">Выходит 4 сезон классного мультсериала, и не терпится узнать, что авторы придумали нового, какие приключения ждут наших друзей?</p>
					</div>
					<div class="recently">
						<div class="people">
							<p class="answers">22 ответа</p>
						</div>
						<div class="who">
							<div class="ava">
								Р
							</div>
							<div class="data">
								<p class="last">Посл. сообщение</p>
								<p class="name">Рита Романова</p>
								<p class="time">02.11.2019, 11:23</p>
							</div>
						</div>
					</div>
				</div>

				<div class="theme">
					<div class="text">
						<p class="zagol">"Скоро новый год. Что можно посмотреть?"</p>
						<p class="nadtext">Устал уже от новогдних Ёлок, Иронии Судьбы, Один дома и других заезженных лент. Посоветуйте что - нибудь стоещее. </p>
					</div>
					<div class="recently">
						<div class="people">
							<p class="answers">21 ответ</p>
						</div>
						<div class="who">
							<div class="ava">
								В
							</div>
							<div class="data">
								<p class="last">Посл. сообщение</p>
								<p class="name">Витя Малек</p>
								<p class="time">05.12.2019, 9:43</p>
							</div>
						</div>
					</div>
				</div>

				<!-- main themes -->

				<section class="main__themes">
					<h1 class="ttl">Популярные темы</h1>
					<div class="theme">
						<div class="text">
							<a href="/forumchan/pages/theme-321.php" class='ser'><p class="zagol">Red Dead Redemption II</p></a>
						</div>
						<span class="works">
							Активная
						</span>
						<div class="recently">
							<div class="forums">
								<p class="temy"><a href="/forumchan/pages/theme-321.php" class="ser"><b>22</b> темы</a></p>
							</div>
						</div>
					</div>
					<div class="theme">
						<div class="text">
							<p class="zagol">Death Stranding</p>
						</div>
						<div class="recently">
							<div class="forums">
								<p class="temy"><a href="#" class="ser"><b>45</b> тем</a></p>
							</div>
						</div>
					</div>
					<div class="theme">
						<div class="text">
							<p class="zagol">Cyberpunk 2077</p>
						</div>
						<div class="recently">
							<div class="forums">
								<p class="temy"><a href="#" class="ser"><b>36</b> тем</a></p>
							</div>
						</div>
					</div>
					<div class="theme">
						<div class="text">
							<p class="zagol">Tesla Cyberdriver</p>
						</div>
						<div class="recently">
							<div class="forums">
								<p class="temy"><a href="#" class="ser"><b>12</b> темы</a></p>
							</div>
						</div>
					</div>
					<div class="theme">
						<div class="text">
							<p class="zagol">Dota 2</p>
						</div>
						<div class="recently">
							<div class="forums">
								<p class="temy"><a href="#" class="ser"><b>322</b> темы</a></p>
							</div>
						</div>
					</div>
					<div class="theme">
						<div class="text">
							<p class="zagol">Counter Strike</p>
						</div>
						<div class="recently">
							<div class="forums">
								<p class="temy"><a href="#" class="ser"><b>735</b> тем</a></p>
							</div>
						</div>
					</div>
				</section>

				<div class="pagination">
					<div class="puncts">
						<div class="punct now"><a href="#">1</a></div>
						<div class="punct"><a href="/forumchan/pages/page2.php">2</a></div>
						<div class="punct"><a href="/forumchan/pages/page3.php">3</a></div>
					</div>
				</div>
			</div>
			<?php
				include_once('pages/footer.php');
			?>
		</div>
		<script src="js/script.js"></script>
</body>
</html>