<?php
	session_start();
	if (isset($_POST)){
		$var = $_POST;
		$cnt1 = count($_SESSION['array']);
		$cnt2 = count($_SESSION['array'][$var['ind1']]);
		if (isset($var['send'])){
			if ($var['ind1'] >= 0 and $var['ind1'] != '' and $var['ind2'] >= 0 and $var['ind2'] != '' and $var['val'] != ''){
				if (empty($_SESSION['array'])){
					$_SESSION['array'][$var['ind1']][$var['ind2']] = $_POST['val'];
					$cnt1 = count($_SESSION['array']);
				}
				else {
					if (!empty($_SESSION['array']) and abs($vars['ind1'] - $cnt1) == 1){
						$_SESSION['array'][$var['ind1']][$var['ind2']] = $_POST['val'];
						$cnt1 = count($_SESSION['array']);
					}
					else {
						echo 'Нельзя разрывать массив!';
					}
				}
			}
		}

		if (isset($var['reset'])){
			unset($_SESSION['array']);
			$cnt1 = count($_SESSION['array']);
			session_destroy();
		}
		echo '<pre>';
		print_r($_SESSION['array']);
		echo '</pre>';
		echo 'Количество элементов в основном массиве: ' . $cnt1;
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.box {
			width: 130px;
		}
		.box input[type="text"] {
			width: 100%;
			height: 30px;
			margin-top: 10px;
		}
		.btns {
			display: flex;
			justify-content: space-between;
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="box">
		<form action="index.php" method="post" id="form">
			<div class="vals">
				<input type="text" name="ind1" placeholder="Индекс 1" value="<?php if (isset($_POST["ind1"])) { echo $_POST['ind1'];}?>"><br>
				<input type="text" name="ind2" placeholder="Индекс 2" value="<?php if (isset($_POST["ind2"])) { echo $_POST['ind2'];}?>"><br>
				<input type="text" name="val" placeholder="Значение" value="<?php if (isset($_POST["val"])) { echo $_POST['val'];}?>">
			</div>
			<div class="btns">
				<input type="submit" name="send" value="add">
				<input type="submit" name="reset" value="reset">
			</div>
		</form>
	</div>
</body>
</html>