<?php


    function which_matrix($arr){
        $cnt = count($arr);
        $diag1 = array(); // 1
        $diag2 = array(); // 0
        $verh1 = array(); // 0
        $verh2 = array(); // 1
        $down1 = array(); // 1
        $down2 = array(); // 0

        // diag
        $f1 = true;

        for ($i = 0; $i < $cnt; $i++){
            for ($j = 0; $j < $cnt; $j++){
                if ($i == $j){
                    $diag1[] = $arr[$i][$j];
                }
                else {
                    $diag2[] = $arr[$i][$j];
                }
            }
        }

        foreach($diag1 as $el){
            if ($el == 0) $f1 = false;
        }
        
        foreach($diag2 as $el){
            if ($el == 1) $f1 = false;
        }

        if ($f1){
            echo 'Матрица является <span class="access">Диагональной</span>';
        }

        // down
        $f2 = true;

        // 1 сверху 
        for ($i = 0; $i < $cnt; $i++){
            for ($j = $i + 1; $j < $cnt; $j++){
                $down1[] = $arr[$i][$j];
            }
        }

        // нули снизу
        for ($i = 0; $i < $cnt; $i++){
            $dif = $cnt - ($cnt - $i);
            for ($j = 0; $j < $dif; $j++){
                $down2[] = $arr[$i][$j];
            }
        }
        $c = 0;
        foreach($down1 as $el){
            if ($el == 1) $c++;
        }

        if ($c == 0) $f2 = false; 

        foreach($down2 as $el){
            if ($el == 1) $f2 = false;
        }

        foreach($diag1 as $el){
            if ($el == 0) $f2 = false;
        }

        if ($f2){
            echo 'Матрица является <span class="access">Верхне Треугольной</span>';
        }

        // 
        // verh
        //
        
        $f3 = true;

        // 0 сверху
        for ($i = 0; $i < $cnt; $i++){
            for ($j = $i + 1; $j < $cnt; $j++){
                $verh1[] = $arr[$i][$j];
            }
        }
        $c = 1;
        // 1 снизу
        for ($i = 1; $i < $cnt; $i++){
            $dif = $cnt - ($cnt - $c);
            for ($j = 0; $j < $dif; $j++){
                $verh2[] = $arr[$i][$j];
            }
            $c++;
        }
        
        foreach($verh1 as $el){
            if ($el == 1) $f3 = false;
        }
        $c = 0;

        foreach($verh2 as $el){
            if ($el == 1) $c++;
        }

        foreach($diag1 as $el){
            if ($el == 0) $f3 = false;
        }

        if ($c == 0) $f3 = false;

        if ($f3){
            echo 'Матрица является <span class="access">Нижне Треугольной</span>';
        }
    }

    function fullTable($arr){
        $cnt = count($arr);
        echo "<table border='1' cellspacing='0'>";
        for ($i = 0; $i < $cnt; $i++){
            echo "<tr>";
            for($j = 0; $j < $cnt; $j++){
                $el = $arr[$i][$j];
                if ($el){
                    echo "<td class='green'>" . $arr[$i][$j] . "</td>";
                }
                else {
                    echo "<td class='red'>" . $arr[$i][$j] . "</td>";
                }
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
                            $num = rand(0, 1);
                            $arr[$i][$j] = $num;
                        }
                    }
                    $arr = [[1,0,0], [0,1,0], [1,0,1]];
                    fullTable($arr);
                    which_matrix($arr);
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

        .red {
            color: red;
        }

        .green {
            color: green;
        }

        body {
            font-family: "Arial", sans-serif;
        }
        .access {
            color: green;
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="task8.2.php" id="form" method="post">
            <input type="text" name="len" placeholder="Число N" value='<?php if (isset($_POST['len'])) echo $_POST['len'];?>'>
            <input type="submit" name="send" value="guess">
        </form>
    </div>
    <br>
    <?php
        doubleArray();
    ?>
</body>
</html>