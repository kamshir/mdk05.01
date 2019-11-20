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

        // Если пользователь не ввел почту
        if ($vars['mail'] == ""){
            $errors[] = 'Введите почту';
        }

        $gender = 'Мужской';

        $_POST['gender'] = $gender;

        // Если пользователь не ввел дату рождения
        if ($vars['data'] == ''){
            $errors[] = 'Введите дату';
        }

        // Считывает возраст
        $dob = strtotime(str_replace("/","-",$vars['data'])); // Дата рождения       
        $tdate = time(); // Время
        $age = 0; 

        // Считает, сколько лет прошло с рождения пользователя
        while( $tdate > $dob = strtotime('+1 year', $dob))
        {
            ++$age;
        }

        // Если студент младше 20 лет, то он не из 81 группы
        if ($vars['number'] == 81 && $age < 20) {
            $errors[] = 'Студент младше 20 лет не может быть в 81 группе';
        }

        // Если студент старше 18 лет, то он не из 82 группы
        if ($vars['number'] == 82 && $age >= 18) {
            $errors[] = 'Студент от 18 лет не может быть в 82 группе';
        }

        // Проверяет, загрузил ли пользователь файл
        if (!is_uploaded_file($_FILES['ava']['tmp_name']) || !file_exists($_FILES['ava']['tmp_name'])){
            $errors[] = 'Загрузите фото';
        }

        // Если не выбрал увлечения
        if (empty($vars['hobbi'])){
            $errors[] = 'Вы не выбрали ни одно из увлечений';
        }

        // Если нет ошибок - мы переходим на свою страницу
        if (empty($errors)) {
            require 'table.html';
            // Если есть файл
            if (isset($_FILES)){
                $file = $_FILES['ava']['name'];
                //Выбираем удобную нам директорию
                $directory = __DIR__ . '\\img\\users\\' . $file;
                // Загружаем
                move_uploaded_file($_FILES['ava']['tmp_name'], $directory);
            }
            $parser = 'file.json';
            $array = array(
                            'mail' => $_POST['mail'], 
                            'data' => $_POST['data'], 
                            'gender' => $_POST['gender'],
                            'number' => $_POST['number'],
                            'ava' => $_FILES['ava']['name'],
                            'hobbi' => $_POST['hobbi']
                        );
            file_put_contents($parser, json_encode($array));
        }

        else {
            // Переход на страницу с забинженными полями
            require 'index.html';
            // Выводит сообщение об ошибке
            print_r("<div class='error' style='color: red; position: absolute; top: 5px; left: 0px; width: 100%;'><div><span style='padding-left: 5px;'>" . array_shift($errors) . "</span></div></div>");
        }
    }
?>