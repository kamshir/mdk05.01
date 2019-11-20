<?php
     $parser = '../file.json';
     $array = array(
                     'name' => $_POST['imya'],
                     'famil' => $_POST['famil'],
                     'otche' => $_POST['otche'],
                     'mail' => $_POST['mail'], 
                     'gender' => $_POST['gender'],
                     'number' => $_POST['number'],
                     'ava' => $_FILES['ava']['name'],
                     'hobbi' => $_POST['hobbi'],
                     'country' => $_POST['country']
                 );
    if (file_exists($file)){
        $file = file_get_contents($parser);
        unset($file);
    }
    else {
        file_put_contents($parser, json_encode($array));
    }
    
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
                <?php echo $_POST['mail'];?>
                <a href="../index.php"><img src="../img/elements/logout.svg" alt="" class="lout" title="Выйти"></a>
            </div>
        </div>

        <div class="exit">можно выйти вот здесь<img src="../img/elements/growth.svg" alt="arrow"></div>

        <div class="page">
            <div class="contain">
                <div class="blk photo">
                    <img src="../site/img/users/<?php echo $_FILES['ava']['name']?>" alt="ava" id="photo">
                </div>
                <h1 class="fname"><?php echo $_POST['famil'] . " " . $_POST['imya'] . " " . $_POST['otche']; ?></h1>
                <h2 class="punct">Информация</h2>
                <div class="blk information">
                    <div class="block_inf">
                        <div class="data">
                            <div class="block">
                                <strong class="arg">День рождения:</strong>
                                    <?php 
                                        $months = ['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
                                        $dob = strtotime(str_replace("/","-",$_POST['data'])); 
                                        
                                        $day = date('j', $dob);
                                        $month = $months[date('n', $dob) - 1];
                                        echo $day . " " . $month; 
                                    ?>
                            </div>
                        </div>
                        <div class="data">
                            <div class="block">
                                <strong class="arg">Пол:</strong>
                                <div class="pol">
                                    <?php 
                                            echo 'Мужской'; 
                                        ?>
                                </div>
                            </div>
                        </div>
                        <div class="data">
                            <div class="block">
                                <strong class="arg">Группа:</strong>
                                <?php 
                                    echo $_POST['number']; 
                                ?>
                            </div>
                        </div>
                        <div class="data">
                            <div class="block">
                                <strong class="arg">Страна:</strong>
                                <?php 
                                    echo $_POST['country']; 
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
                        if (isset($_POST['hobbi'])){
                            $vals = $_POST['hobbi'];
                            foreach($vals as $val){
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
                            
                        ?>
                    </div>
                </div>

                <div class="blk hobbi">
                    <h2 class="punct">Доп. файлы</h2>
                    <?php
                        foreach($array as $el){
                            print($el);
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer">
        <p>All rights reserved. 2019. <?php echo "<span style='color: #eee;'>";?> <span class="nik"><?php echo $_POST['famil']?></span></p>
    </footer>

    <script src="../js/infa.js"></script>
</body>

</html>