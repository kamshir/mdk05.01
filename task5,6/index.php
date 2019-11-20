<?php

    $errors = array(); // Ошибки

    $vars = $_POST; // Данные
    // Проверяет, нажата ли кнопка
    if (isset($vars['send'])){ 

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

        if (isset($_FILES)){
            $file = $_FILES['ava']['name'];
            //Выбираем удобную нам директорию
            $directory = __DIR__ . '\\img\\users\\' . $file;
            // Загружаем
            move_uploaded_file($_FILES['ava']['tmp_name'], $directory);
        }

        // Если нет ошибок, то успешно переходим на свою страницу
        if (!empty($errors)) {
            print_r("<div class='error'><div><span style='padding-left: 5px;'>" . array_shift($errors) . "</span></div></div>");
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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="forma">
        <form action="php/table.php" method="POST" id="form" enctype="multipart/form-data">
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
                    <div class="inp">
                        <p><label for="mail">Почта</label></p>
                        <input type="email" name="mail" pattern=".+@mail.ru" placeholder="Ваша почта (@mail.ru)"
                            value="<?php if(isset($_POST['mail'])) {echo $_POST['mail'];} ?>">
                    </div>
                    <div class="inp">
                        <p><label for="data">Дата рождения</label></p>
                        <input type="date" name="data" id="date"
                            value="<?php if(isset($_POST['data'])) {echo $_POST['data'];} ?>">
                    </div>
                    <div class="inp group">
                        <label for="number">№ гр.</label>
                        <select name="number" id="chose">
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                        </select>
                        <label for="country">Страна</label>
                        <select name="country" id="country">
                            <option>Абхазия</option>
                            <option>Австралия</option>
                            <option>Австрия</option>
                            <option>Азербайджан</option>
                            <option>Албания</option>
                            <option>Алжир</option>
                            <option>Американское Самоа</option>
                            <option>Ангилья</option>
                            <option>Ангола</option>
                            <option>Андорра</option>
                            <option>Антарктида</option>
                            <option>Антигуа и Барбуда</option>
                            <option>Аргентина</option>
                            <option>Армения</option>
                            <option>Аруба</option>
                            <option>Афганистан</option>
                            <option>Багамы</option>
                            <option>Бангладеш</option>
                            <option>Барбадос</option>
                            <option>Бахрейн</option>
                            <option>Беларусь</option>
                            <option>Белиз</option>
                            <option>Бельгия</option>
                            <option>Бенин</option>
                            <option>Бермуды</option>
                            <option>Болгария</option>
                            <option>Боливия, Многонациональное Государство</option>
                            <option>Бонайре, Саба и Синт-Эстатиус</option>
                            <option>Босния и Герцеговина</option>
                            <option>Ботсвана</option>
                            <option>Бразилия</option>
                            <option>Британская территория в Индийском океане</option>
                            <option>Бруней-Даруссалам</option>
                            <option>Буркина-Фасо</option>
                            <option>Бурунди</option>
                            <option>Бутан</option>
                            <option>Вануату</option>
                            <option>Венгрия</option>
                            <option>Венесуэла Боливарианская Республика</option>
                            <option>Виргинские острова, Британские</option>
                            <option>Виргинские острова, США</option>
                            <option>Вьетнам</option>
                            <option>Габон</option>
                            <option>Гаити</option>
                            <option>Гайана</option>
                            <option>Гамбия</option>
                            <option>Гана</option>
                            <option>Гваделупа</option>
                            <option>Гватемала</option>
                            <option>Гвинея</option>
                            <option>Гвинея-Бисау</option>
                            <option>Германия</option>
                            <option>Гернси</option>
                            <option>Гибралтар</option>
                            <option>Гондурас</option>
                            <option>Гонконг</option>
                            <option>Гренада</option>
                            <option>Гренландия</option>
                            <option>Греция</option>
                            <option>Грузия</option>
                            <option>Гуам</option>
                            <option>Дания</option>
                            <option>Джерси</option>
                            <option>Джибути</option>
                            <option>Доминика</option>
                            <option>Доминиканская Республика</option>
                            <option>Египет</option>
                            <option>Замбия</option>
                            <option>Западная Сахара</option>
                            <option>Зимбабве</option>
                            <option>Израиль</option>
                            <option>Индия</option>
                            <option>Индонезия</option>
                            <option>Иордания</option>
                            <option>Ирак</option>
                            <option>Иран, Исламская Республика</option>
                            <option>Ирландия</option>
                            <option>Исландия</option>
                            <option>Испания</option>
                            <option>Италия</option>
                            <option>Йемен</option>
                            <option>Кабо-Верде</option>
                            <option>Казахстан</option>
                            <option>Камбоджа</option>
                            <option>Камерун</option>
                            <option>Канада</option>
                            <option>Катар</option>
                            <option>Кения</option>
                            <option>Кипр</option>
                            <option>Киргизия</option>
                            <option>Кирибати</option>
                            <option>Китай</option>
                            <option>Кокосовые (Килинг) острова</option>
                            <option>Колумбия</option>
                            <option>Коморы</option>
                            <option>Конго</option>
                            <option>Конго, Демократическая Республика</option>
                            <option>Корея, Народно-Демократическая Республика</option>
                            <option>Корея, Республика</option>
                            <option>Коста-Рика</option>
                            <option>Кот д'Ивуар</option>
                            <option>Куба</option>
                            <option>Кувейт</option>
                            <option>Кюрасао</option>
                            <option>Лаос</option>
                            <option>Латвия</option>
                            <option>Лесото</option>
                            <option>Ливан</option>
                            <option>Ливийская Арабская Джамахирия</option>
                            <option>Либерия</option>
                            <option>Лихтенштейн</option>
                            <option>Литва</option>
                            <option>Люксембург</option>
                            <option>Маврикий</option>
                            <option>Мавритания</option>
                            <option>Мадагаскар</option>
                            <option>Майотта</option>
                            <option>Макао</option>
                            <option>Малави</option>
                            <option>Малайзия</option>
                            <option>Мали</option>
                            <option>Малые Тихоокеанские отдаленные острова Соединенных Штатов</option>
                            <option>Мальдивы</option>
                            <option>Мальта</option>
                            <option>Марокко</option>
                            <option>Мартиника</option>
                            <option>Маршалловы острова</option>
                            <option>Мексика</option>
                            <option>Микронезия, Федеративные Штаты</option>
                            <option>Мозамбик</option>
                            <option>Молдова, Республика</option>
                            <option>Монако</option>
                            <option>Монголия</option>
                            <option>Монтсеррат</option>
                            <option>Мьянма</option>
                            <option>Намибия</option>
                            <option>Науру</option>
                            <option>Непал</option>
                            <option>Нигер</option>
                            <option>Нигерия</option>
                            <option>Нидерланды</option>
                            <option>Никарагуа</option>
                            <option>Ниуэ</option>
                            <option>Новая Зеландия</option>
                            <option>Новая Каледония</option>
                            <option>Норвегия</option>
                            <option>Объединенные Арабские Эмираты</option>
                            <option>Оман</option>
                            <option>Остров Буве</option>
                            <option>Остров Мэн</option>
                            <option>Остров Норфолк</option>
                            <option>Остров Рождества</option>
                            <option>Остров Херд и острова Макдональд</option>
                            <option>Острова Кайман</option>
                            <option>Острова Кука</option>
                            <option>Острова Теркс и Кайкос</option>
                            <option>Пакистан</option>
                            <option>Палау</option>
                            <option>Палестинская территория, оккупированная</option>
                            <option>Панама</option>
                            <option>Папский Престол (Государство — город Ватикан)</option>
                            <option>Папуа-Новая Гвинея</option>
                            <option>Парагвай</option>
                            <option>Перу</option>
                            <option>Питкерн</option>
                            <option>Польша</option>
                            <option>Португалия</option>
                            <option>Пуэрто-Рико</option>
                            <option>Республика Македония</option>
                            <option>Реюньон</option>
                            <option>Россия</option>
                            <option>Руанда</option>
                            <option>Румыния</option>
                            <option>Самоа</option>
                            <option>Сан-Марино</option>
                            <option>Сан-Томе и Принсипи</option>
                            <option>Саудовская Аравия</option>
                            <option>Свазиленд</option>
                            <option>Святая Елена, Остров вознесения, Тристан-да-Кунья</option>
                            <option>Северные Марианские острова</option>
                            <option>Сен-Бартельми</option>
                            <option>Сен-Мартен</option>
                            <option>Сенегал</option>
                            <option>Сент-Винсент и Гренадины</option>
                            <option>Сент-Китс и Невис</option>
                            <option>Сент-Люсия</option>
                            <option>Сент-Пьер и Микелон</option>
                            <option>Сербия</option>
                            <option>Сейшелы</option>
                            <option>Сингапур</option>
                            <option>Синт-Мартен</option>
                            <option>Сирийская Арабская Республика</option>
                            <option>Словакия</option>
                            <option>Словения</option>
                            <option>Соединенное Королевство</option>
                            <option>Соединенные Штаты</option>
                            <option>Соломоновы острова</option>
                            <option>Сомали</option>
                            <option>Судан</option>
                            <option>Суринам</option>
                            <option>Сьерра-Леоне</option>
                            <option>Таджикистан</option>
                            <option>Таиланд</option>
                            <option>Тайвань (Китай)</option>
                            <option>Танзания, Объединенная Республика</option>
                            <option>Тимор-Лесте</option>
                            <option>Того</option>
                            <option>Токелау</option>
                            <option>Тонга</option>
                            <option>Тринидад и Тобаго</option>
                            <option>Тувалу</option>
                            <option>Тунис</option>
                            <option>Туркмения</option>
                            <option>Турция</option>
                            <option>Уганда</option>
                            <option>Узбекистан</option>
                            <option>Украина</option>
                            <option>Уоллис и Футуна</option>
                            <option>Уругвай</option>
                            <option>Фарерские острова</option>
                            <option>Фиджи</option>
                            <option>Филиппины</option>
                            <option>Финляндия</option>
                            <option>Фолклендские острова (Мальвинские)</option>
                            <option>Франция</option>
                            <option>Французская Гвиана</option>
                            <option>Французская Полинезия</option>
                            <option>Французские Южные территории</option>
                            <option>Хорватия</option>
                            <option>Центрально-Африканская Республика</option>
                            <option>Чад</option>
                            <option>Черногория</option>
                            <option>Чешская Республика</option>
                            <option>Чили</option>
                            <option>Швейцария</option>
                            <option>Швеция</option>
                            <option>Шпицберген и Ян Майен</option>
                            <option>Шри-Ланка</option>
                            <option>Эквадор</option>
                            <option>Экваториальная Гвинея</option>
                            <option>Эландские острова</option>
                            <option>Эль-Сальвадор</option>
                            <option>Эритрея</option>
                            <option>Эстония</option>
                            <option>Эфиопия</option>
                            <option>Южная Африка</option>
                            <option>Южная Джорджия и Южные Сандвичевы острова</option>
                            <option>Южная Осетия</option>
                            <option>Южный Судан</option>
                            <option>Ямайка</option>
                            <option>Япония</option>
                        </select>
                    </div>
                    <p class="p1" style="margin-top: 10px;">Фотография</p>
                    <div class="photo">
                        <label for="ava" class="lfoto">
                            <p class="load">Загрузить фото</p>
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
                    <div class="dop">
                        <p>Дополнительные файлы</p>
                        <label for="dop" class="btndop">Доп. Файлы</label>
                        <input type="file" id="dop" name="dop[]" multiple>
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
    </div>
    <script src="js/infa.js"></script>
</body>

</html>