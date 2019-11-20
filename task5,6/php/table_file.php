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

        // Если нет ошибок - мы переходим на свою страницу
        if (!empty($errors)) {
            // Выводит сообщение об ошибке
            print_r("<div class='error' style='color: red; position: absolute; top: 5px; left: 0px; width: 100%;'><div><span style='padding-left: 5px;'>" . array_shift($errors) . "</span></div></div>");
        }
    }
?>

<?php 
    $parser = '../' . $_FILES['fl']['name'];
    $array = json_decode(file_get_contents($parser));
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Информация</title>
    <link rel="stylesheet" href="../css/table.css">
</head>

<body>
    <div class="content">
        <div class="panel">
            <div class="initials">
                <span class="famil"><?php echo $_POST['famil'];?></span>
                <span class="name"><?php echo $_POST['imya'];?></span>
                <span class="name"><?php echo $_POST['otche'];?></span>
            </div>
            <div class="logout">
                <?php 
                    foreach($array as $key => $value){
                        if ($key == 'mail'){
                            echo $value;
                        }
                    }
                ?>
                <a href="../index.php"><img src="../img/elements/logout.svg" alt="" class="lout" title="Выйти"></a>
            </div>
        </div>

        <div class="exit">можно выйти вот здесь<img src="../img/elements/growth.svg" alt="arrow"></div>

        <div class="page">
            <div class="contain">
                <div class="blk photo">
                    <?php
                        if (isset($array->ava)){
                            foreach($array as $key => $value){
                                if ($key == 'ava'){
                                    echo '<img src="../img/users/' . $value . ' alt="ava" id="photo">';
                                }
                            } 
                        }
                    ?>
                   
                </div>
                <h1 class="fname"><?php echo $_POST['famil'] . " " . $_POST['imya'] . " " . $_POST['otche']; ?></h1>
                <h2 class="punct">Информация</h2>
                <div class="blk information">
                    <div class="block_inf">
                        <div class="data">
                            <div class="block">
                                <strong class="arg">День рождения:</strong>
                                    <?php 
                                        foreach ($array as $key => $value)
                                            {
                                                if ($key == 'data')
                                                {
                                                    $months = ['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
                                                    $dob = strtotime(str_replace("/","-",$value)); 
                                                    
                                                    $day = date('j', $dob);
                                                    $month = $months[date('n', $dob) - 1];
                                                    echo $day . " " . $month;
                                                }
                                            }
                                    ?>
                            </div>
                        </div>
                        <div class="data">
                            <div class="block">
                                <strong class="arg">Пол:</strong>
                                <div class="pol">
                                        <?php 
                                            foreach($array as $key => $value){
                                                if ($key == 'gender'){
                                                    echo $value;
                                                }
                                            }
                                        ?>
                                </div>
                            </div>
                        </div>
                        <div class="data">
                            <div class="block">
                                <strong class="arg">Страна:</strong>
                                <div class="pol">
                                        <?php 
                                            foreach($array as $key => $value){
                                                if ($key == 'country'){
                                                    echo $value;
                                                }
                                            }
                                        ?>
                                </div>
                            </div>
                        </div>
                        <div class="data">
                            <div class="block">
                                <strong class="arg">Группа:</strong>
                                <?php 
                                    foreach($array as $key => $value){
                                        if ($key == 'number'){
                                            echo $value;
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="data">
                            <div class="block">
                                <strong class="arg">Деятельность:</strong>
                                <span>Студент(ка)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blk hobbi">
                    <h2 class="punct">Увлечения</h2>
                    <div class="interests">
                        <?php
                            if (isset($array->hobbi)){
                                    foreach($array as $key => $value){
                                    if ($key == 'hobbi'){
                                        foreach($value as $val){
                                            if ($val == 'html'){
                                                echo "<div class='interes'><img src='../img/hobbi/html5-brands.svg'>HTML</div>";
                                            }
                                            if ($val == 'css'){
                                                echo "<div class='interes'><img src='../img/hobbi/css3-alt-brands.svg'>CSS</div>";
                                            }
                                            if ($val == 'js'){
                                                echo "<div class='interes'><img src='../img/hobbi/js-brands.svg'>JS</div>";
                                            }
                                            if ($val == 'php'){
                                                echo "<div class='interes'><img src='../img/hobbi/php-brands.svg'>PHP</div>";
                                            }
                                        }
                                    }
                                }
                            }
                            
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer">
        <p>All rights reserved. 2019. СПбКИТ, <span class="nik"><?php echo $_POST['famil']?></span></p>
    </footer>

    <script src="js/infa.js"></script>
</body>

</html>