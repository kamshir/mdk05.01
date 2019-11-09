<?php
    function fullTable($arr){
        $cnt = count($arr);
        echo "<table border='1' cellspacing='0'>";
        for ($i = 0; $i < $cnt; $i++){
            echo "<tr>";
            for($j = 0; $j < $cnt; $j++){
                echo "<td>" . $arr[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function doubleArray(){
        if (isset($_POST)){
            if (isset($_POST['send'])){
                $arr = array();
                $var = $_POST;
                $errors = array();
                $len = $var['len'];

                if ($len < 0){
                    $errors[] = 'Отрицательное число!';
                }

                else if ($len == 0){
                    $errors[] = 'Пусто!';
                }

                if (empty($errors)){
                    for($i = 0; $i < $len; $i++){
                        for($j = 0; $j < $len; $j++){
                            $num = rand(0, 9);
                            $arr[$i][$j] = $num;
                        }
                    }

                    fullTable($arr);
                }
                else {
                    echo "<span class='err'>" . array_shift($errors) . "</span>";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 8</title>
    <style>
        td {
            text-align:center;
            width: 15px;
        }
        .err {
            color: red;
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="task8.1.php" id="form" method="post">
            <input type="text" name="len" placeholder="Число N">
            <input type="submit" name="send" value="guess">
        </form>
    </div>
    <br>
    <?php
        doubleArray();
    ?>
</body>
</html>