<?php
    require 'info_file.html';

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