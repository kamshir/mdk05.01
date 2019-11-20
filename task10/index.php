<!-- ------------------------------------ -->
<!--                                      -->
<!--        Практическая работа №10       -->
<!--                                      -->
<!-- ------------------------------------ -->
<!--                                      -->
<!-- Выполнил: Ширшиков Максим, 81 группа -->
<!-- ------------------------------------ -->

<?php
    // Массив с итемами и ценами на них
    $ar = [
        ['item'=>'tovar1', 'price'=> 100],
        ['item'=>'tovar2', 'price'=> 95],
        ['item'=>'tovar3', 'price'=> 104],
        ['item'=>'tovar4', 'price'=> 120],
        ['item'=>'tovar5', 'price'=> 50],
        ['item'=>'tovar6', 'price'=> 60]
      ];
      
    // Проверка 
    if (isset($_POST)){
        $var = $_POST;
        if (isset($var['send'])){
            if (isset($var['num'])){

                // Товар, цену которого сравнивают с остальными
                $tov = ['item'=>'tovar0', 'price'=> $var['num']];

                // Массив перемешанных значений
                $mass = array();
                foreach($ar as $item){
                    if ($tov['price'] >= $item['price']){
                        $mass[] = $item['price'];
                    }
                }

                // Сортировка в порядке возрастания
                asort($mass);

                $returnMass = array();

                // Заполнение массива
                foreach($mass as $el){
                    $returnMass[] = $el;
                }

                // Взятие заголовков товаров для текущего массива и расстановка цен в правильном порядке
                $mass1 = array();
                foreach($ar as $el => $val){
                    // Если введённая цена меньше чем у какого- нибудь товара - он пропускается
                    if ($val['price'] <= $var['num']){
                        $mass1[] = $val;
                    }
                }

                // Присвоение цен полученному массиву
                for($i = 0; $i < count($mass); $i++){
                    $mass1[$i]['price'] = $returnMass[$i];
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
    <title>Task 10</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="panel">
        <p class="hsort">Функция сортировки</p>
    </div>

    <div class="btn">
      <form action="index.php" method="POST">
      <p class="label">Сортировка по цене, относительно введённого числа</p>
      <div class="box">
        <div class="inp">
            <input type="text" name="num" placeholder="Число" value="<?php if (isset($_POST['num'])) echo $_POST['num'];?>" id="field">
            <input type="submit" name="send" value="Guess!" id="btn">
        </div>
      </div>
      </form>
    </div>

    <ul class="list">
        <?php
            $cnt = 0;
            // Если пользователь отправил число
            if (isset($var['send'])){
                $arr = $mass1;
                // Вывод товаров, цена которых меньше введённой пользователем
                foreach($arr as $el){
                    echo '<li class="item">';
                    echo '<div class="el">
                            <p class="tovar">' . $el['item'] .'</p>
                            <p class="price">
                                <strong>Цена: </strong>' . $el['price'] . '</p>
                            </div>';
                    echo '</li>';
                    $cnt++;
                }
            }
            else {
                // Вывод товаров при первом появлении
                foreach($ar as $val){
                    echo '<li class="item">';
                    echo '<div class="el">
                            <p class="tovar">' . $val['item'] .'</p>
                            <p class="price">
                                <strong>Цена: </strong>' . $val['price'] . '</p>
                            </div>';
                    echo '</li>';
                }
            }
            // Если нет товаров подешевле
            if (!$cnt && isset($_POST['send'])){
                echo '<div class="nothing">Извините, но дешевле товаров у нас нет!</div>';
            }
        ?>
    </ul>
    <script src="lib/sweetalert.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>