<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="keywords" content="site">
	<meta name="description" content="site">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Forumchan</title>
	<link rel="stylesheet" href="/forumchan/css/null.css">
	<link rel="stylesheet" href="/forumchan/css/header.css">
	<link rel="stylesheet" href="/forumchan/css/footer.css">
	<link rel="stylesheet" href="/forumchan/css/slider.css">
	<link rel="stylesheet" href="/forumchan/css/themes.css">
	<link rel="stylesheet" href="/forumchan/css/footer.css">
</head>
<body>
	<div class="main_block">
		<?php
			include_once('header.php');
			include_once('slider.php');
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
							<a href="#1" class='ser'><p class="zagol">Джокер</p></a>
						</div>
						<div class="recently">
							<div class="forums">
								<p class="temy"><a href="#3" class="ser"><b>22</b> темы</a></p>
							</div>
						</div>
					</div>
					<div class="theme">
						<div class="text">
							<p class="zagol">Marvel</p>
						</div>
						<div class="recently">
							<div class="forums">
								<p class="temy"><a href="#" class="ser"><b>45</b> тем</a></p>
							</div>
						</div>
					</div>
					<div class="theme">
						<div class="text">
							<p class="zagol">DC</p>
						</div>
						<div class="recently">
							<div class="forums">
								<p class="temy"><a href="#" class="ser"><b>36</b> тем</a></p>
							</div>
						</div>
					</div>
					<div class="theme">
						<div class="text">
							<p class="zagol">Российская музыка</p>
						</div>
						<div class="recently">
							<div class="forums">
								<p class="temy"><a href="#" class="ser"><b>12</b> темы</a></p>
							</div>
						</div>
					</div>
					<div class="theme">
						<div class="text">
							<p class="zagol">Mystery Tour</p>
						</div>
						<div class="recently">
							<div class="forums">
								<p class="temy"><a href="#" class="ser"><b>322</b> темы</a></p>
							</div>
						</div>
					</div>
					<div class="theme">
						<div class="text">
							<p class="zagol">Steelwater</p>
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
						<div class="punct"><a href="/forumchan/index.php">1</a></div>
						<div class="punct"><a href="/forumchan/pages/page2.php">2</a></div>
						<div class="punct now"><a href="#3">3</a></div>
					</div>
				</div>
			</div>
			<?php
				include_once('footer.php');
			?>
		</div>
		<script src="/forumchan/js/script.js"></script>
</body>
</html>