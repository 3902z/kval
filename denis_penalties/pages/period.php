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
<h1>Штрафы за период</h1>
<form action="/period" method="POST">
    <fieldset>
        <legend>Штрафы за период</legend>

        <p>
            <label for="date_start">Дата от</label>
            <input type="date" id="date_start" name="date_start">
        </p>
        <p>
            <label for="date_end">Дата до</label>
            <input type="date" id="date_end" name="date_end">
        </p>

    </fieldset>
    <p><input type="submit" value="Отправить" name="send"></p>
</form>
</body>
</html>

<?php

    //если нажата кнопка отправить
    if(isset($_POST['send'])) {
        //создаем запрос
        $sql = "SELECT * FROM Penalties WHERE p_date BETWEEN '{$_POST["date_start"]}' AND '{$_POST["date_end"]}'";
        //подготавливаем пустой массив под нарушения
        $penalties = [];
        //делаем запрос к базе данных
        if ($result = $connection->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $penalties[] = $row;
            }
        }
        //перебираем массив со штрафами
        foreach ($penalties as $penalty) {
            echo $penalty['id'] . " : " . $penalty['p_date'] . " : " . $penalty['p_type'] .  "<br/>";
        }
    }

?>
