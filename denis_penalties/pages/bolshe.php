<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Больше всего штрафов</h1>
<?php


    $sql = "SELECT cars.car_number as 'номер машины', COUNT(cars_penalties.penalty_id) as 'кол-во штрафов' FROM cars_penalties JOIN cars WHERE cars.id=cars_penalties.car_id GROUP BY cars_penalties.car_id";
    $penalties = [];
    if ($result = $connection->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $penalties[] = $row;
        }
    }
    echo "<pre>";
    print_r($penalties);
    echo "</pre>";
//
    //перебираем массив со штрафами
//    foreach ($penalties as $penalty) {
//        echo $penalty['id'] . " : " . $penalty['p_date'] . " : " . $penalty['p_type'] .  "<br/>";
//    }

?>
</body>
</html>