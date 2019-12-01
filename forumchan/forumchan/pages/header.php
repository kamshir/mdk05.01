<header class="header">
	<!-- navigation -->
	<nav class="panel">
		<a href="/forumchan/index.php"><h1 class="logo">Forumchan</h1></a>
		<form>
			<div class="search desk">
					<div class="inp">
						<input type="text" name="search" placeholder="Поиск">
					</div>
					<div class="sub">
						<input type="submit" name="send" value="Поиск">
					</div>
			</div>
		</form>
		<?php 
			if (isset($_SESSION['login'])){
				echo '<div class="user">';
				echo '<form action="/forumchan/pages/enter.php" method="POST">';
				echo '<span class="login" title="Это вы">' . $_SESSION['login'] . '</span>';
				echo '<label for="exit"><img class="exit" src="/forumchan/img/logout.svg" title="Выйти"></label>';
				echo '<input type="submit" name="exit" id="exit">';
				echo '</form>';
				echo '</div>';
			}
			else {
				echo '<div class="user">
							<a href="/forumchan/pages/enter.php" id="enter">Войти</a>
							<strong>/</strong>
							<a href="/forumchan/pages/reg.php" id="reg">Регистрация</a>
						</div>';
			}
		 ?>
		<div class="button">
			<button id='search' class="open">Найти</button>
		</div>
	</nav>
	<div class="mon_search">
		<form>
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