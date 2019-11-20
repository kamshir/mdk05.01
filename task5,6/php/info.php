<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <form action="table.php" method="POST" id="forma" enctype="multipart/form-data">
        <fieldset id="field">
            <legend>Авторизация</legend>
            <div class="info">
                <div class="inp">
                    <p><label for="imya">Имя</label></p>
                    <input type="text" name="imya" placeholder="Ваше имя" value="<?php echo $_POST['imya'];?>">
                </div>
                <div class="inp">
                    <p><label for="famil">Фамилия</label></p>
                    <input type="text" name="famil" placeholder="Ваша фамилия" value="<?php echo $_POST['famil'];?>">
                </div>
                <div class="inp">
                    <p><label for="otche">Отчество</label></p>
                    <input type="text" name="otche" placeholder="Ваше отчество" value="<?php echo $_POST['otche'];?>">
                </div>
                <div class="inp">
                    <p><label for="mail">Почта</label></p>
                    <input type="email" name="mail" pattern=".+@mail.ru" placeholder="Ваша почта (@mail.ru)"
                        value="<?php echo $_POST['mail'];?>">
                </div>
                <div class="inp">
                    <p><label for="data">Дата рождения</label></p>
                    <input type="date" name="data" id="date" value="<?php echo $_POST['data'];?>">
                </div>
                <div class="inp group">
                    <label for="number">Номер группы</label>
                    <select name="number" id="chose">
                        <option value="81">81</option>
                        <option value="82">82</option>
                        <option value="83">83</option>
                    </select>
                </div>
                <p class="p1" style="margin-top: 10px;">Фотография</p>
                <div class="photo">
                    <label for="ava" class="lfoto">
                        <p class="load">Загрузить фото</p>
                        <p class="filename"></p>
                    </label>
                    <input type="file" id="ava" name="ava">
                </div>
                <div class="hobbi">
                    <p class="p1"><label for="data">Увлечения</label></p>
                    <div class="interes">
                        <label for="html" class="bl_int">
                            <div class="wrap">
                                <p>HTML</p>
                                <input type="checkbox" name="hobbi[]" value="html" id="html">
                            </div>
                        </label>
                        <label for="css" class="bl_int">
                            <div class="wrap">
                                <p>CSS</p>
                                <input type="checkbox" name="hobbi[]" value="css" id="css">
                            </div>
                        </label>
                        <label for="js" class="bl_int">
                            <div class="wrap">
                                <p>JS</p>
                                <input type="checkbox" name="hobbi[]" value="js" id="js">
                            </div>
                        </label>
                        <label for="php" class="bl_int">
                            <div class="wrap">
                                <p>PHP</p>
                                <input type="checkbox" name="hobbi[]" value="php" id="php">
                            </div>
                        </label>
                    </div>
                </div>
                <div class="inp btn">
                    <input type="submit" name="send" id="send" value="Отправить">
                    <label for="send">
                        <div class="send">Отправить</div>
                    </label>
                    <div class="file_block">
                        <a id="file" href="info_file.php">войти с помощью файла с информацией</a>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>

    <script src="js/infa.js"></script>
</body>

</html>