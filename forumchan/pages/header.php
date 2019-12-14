<header class="header">
	<!-- navigation -->
	<nav class="panel">
		<a href="/forumchan/index.php"><h1 class="logo">Forumchan</h1></a>
		<form action="/forumchan/pages/search.php" method="GET">
			<div class="search desk">
					<div class="inp">
						<input type="text" name="search" placeholder="Поиск" value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>">
					</div>
					<div class="sub">
						<input type="submit" name="send" value="Поиск">
					</div>
			</div>
		</form>
		<?php 
			if (isset($_SESSION['login'])){
		?>
			<div class="user">
				<form action="/forumchan/pages/exit.php" method="POST">
					<span class="login" title="Это вы"><?= $_SESSION['login'] ?></span>
					<label for="exit"><img class="exit" src="/forumchan/img/logout.svg" title="Выйти"></label>
					<input type="submit" name="exit" id="exit">
				</form>
			</div>

		<?php
			}
			else {
		?>
			<div class="user">
				<a href="/forumchan/pages/enter.php" id="enter">Войти</a>
				<strong>/</strong>
				<a href="/forumchan/pages/reg.php" id="reg">Регистрация</a>
			</div>
		<?php
			}
		 ?>
		<div class="button">
			<button id='search' class="open">Найти</button>
		</div>
	</nav>
	<div class="mon_search">
		<form action="/forumchan/pages/search.php" method="GET">
			<div class="search mob">
					<div class="inp">
						<input type="text" name="search" placeholder="Поиск">
					</div>
					<div class="sub">
						<input type="submit" name="send" value="Поиск">
					</div>
			</div>
		</form>
	</div>
</header>