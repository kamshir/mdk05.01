<?php

    $vars = $_POST;

    $errors = array(); // Ошибки

    // Проверяет, нажата ли кнопка
    if (isset($vars['send'])){

        // Если пользователь не ввел имя
        if ($vars['imya'] == ''){
            $errors[] = 'Введите имя';
        }

        // Если пользователь не ввел фамилию
        if ($vars['famil'] == ''){
            $errors[] = 'Введите фамилию';
        }

        // Если пользователь не ввел отчество
        if ($vars['otche'] == ''){
            $errors[] = 'Введите отчество';
        }

        if (!is_uploaded_file($_FILES['fl']['tmp_name']) || !file_exists($_FILES['fl']['tmp_name'])){
            $errors[] = 'Загрузите файл';
        }

        if (!empty($errors)) {
             print_r("<div class='error' style='color: red; position: absolute; top: 5px; left: 0px; width: 100%;'><div><span style='padding-left: 5px;'>" . array_shift($errors) . "</span></div></div>");
        }
    }
?>

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
    <form action="table_file.php" method="POST" id="forma" enctype="multipart/form-data">
        <fieldset id="field">
            <legend>Авторизация</legend>
            <div class="info">
                <div class="inp">
                    <p><label for="imya">Имя</label></p>
                    <input type="text" name="imya" placeholder="Ваше имя"
                        value="<?php if(isset($_POST['imya'])) {echo $_POST['imya'];} ?>">
                </div>
                <div class="inp">
                    <p><label for="famil">Фамилия</label></p>
                    <input type="text" name="famil" placeholder="Ваша фамилия"
                        value="<?php if(isset($_POST['famil'])) {echo $_POST['famil'];} ?>">
                </div>
                <div class="inp">
                    <p><label for="otche">Отчество</label></p>
                    <input type="text" name="otche" placeholder="Ваше отчество"
                        value="<?php if(isset($_POST['otche'])) {echo $_POST['otche'];} ?>">
                </div>
                <div class="fl">
                    <p><label for="otche">Файл с данными</label></p>
                    <input type="file" name="fl">
                </div>
                <div class="inp btn">
                    <input type="submit" name="send" id="send" value="Отправить">
                    <label for="send">
                        <div class="send">Отправить</div>
                    </label>
                    <div class="file_block">
                        <a id="file" href="index.php">войти с помощью данных</a>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
    <script src="js/infa.js"></script>
</body>

</html>