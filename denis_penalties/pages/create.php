<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание штрафа</title>
</head>
<body>
    <h1>Создание нового штрафа</h1>
    <form action="/create" method="POST">
        <fieldset>
            <legend>Новый штраф</legend>
            <p>
                <label for="car-name">Номер авто</label>
                <input type="text" id="car-name" name="car-name" required>
            </p>
            <p>
                <label for="penalty-date">Дата нарушения</label>
                <input type="date" id="penalty-date" name="penalty-date">
            </p>
            <p>
                <label for="penalty-time">Время нарушения</label>
                <input type="time" id="penalty-time" name="penalty-time">
            </p>
            <p>
                <label for="penalty-type">Вид нарушения</label>
                <input type="text" id="penalty-type" name="penalty-type">
            </p>
            <p>
                <label for="penalty-amount">Размер штрафа(руб)</label>
                <input type="text" id="penalty-amount" name="penalty-amount">
            </p>
        </fieldset>
        <p><input type="submit" value="Отправить" name="send"></p>
    </form>
</body>
</html>

<?php
    //проверка на нажатие кнопки
    if (isset($_POST['send'])) {
        //ID машины
        $car_id = null;
        //ID штрафа
        $penalty_id = null;

        //запрос на проверку наличия авто в базе
        $sql = "SELECT * FROM Cars WHERE car_number='{$_POST["car-name"]}'";
        $auto = [];
        if ($result = $connection->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $auto[] = $row;
            }
        }


        //если есть авто
        if($auto) {
            // ---------------Машина есть---------------------
            //получаем ID машины
            $car_id =  $auto[0]['id'];
            // ---------------Добавить штраф в бд---------------------
            $sql = "INSERT INTO Penalties (p_type, p_amount) 
                        VALUES (
                                '{$_POST["penalty-type"]}',
                                '{$_POST["penalty-amount"]}'
                                )";
            if($connection->query($sql)){
                echo "Штраф успешно добавлен";
                //получение ID добавленного штрафа
                $penalty_id = mysqli_insert_id($connection);
            } else{
                echo "Ошибка: " . $connection->error;
            }
            // ---------------Добавить в таблицу связей---------------------
            $sql = "INSERT INTO Cars_Penalties (car_id, penalty_id) 
                        VALUES ('{$car_id}', '{$penalty_id}')";
            if($connection->query($sql)){
                echo "Данные в связанную табл добавлены";
            } else{
                echo "Ошибка: " . $connection->error;
            }
        } else {
            // ---------------Машины нет---------------------

            // ---------------Добавить штраф в бд---------------------
            $sql = "INSERT INTO Penalties (p_type, p_amount) 
                        VALUES (
                                '{$_POST["penalty-type"]}',
                                '{$_POST["penalty-amount"]}'
                                )";
            if($connection->query($sql)){
                echo "Штраф успешно добавлен";
                //получение ID добавленного штрафа
                $penalty_id = mysqli_insert_id($connection);
            } else{
                echo "Ошибка: " . $connection->error;
            }

            // ---------------Добавить машину в бд---------------------
            $sql = "INSERT INTO Cars (car_number) 
                        VALUES ('{$_POST["car-name"]}')";
            if($connection->query($sql)){
                echo "Машина успешно добавлена";
                //получение ID добавленной машины
                $car_id = mysqli_insert_id($connection);
            } else{
                echo "Ошибка: " . $connection->error;
            }

            // ---------------Добавить в таблицу связей---------------------
            $sql = "INSERT INTO Cars_Penalties (car_id, penalty_id) 
                        VALUES ('{$car_id}', '{$penalty_id}')";
            if($connection->query($sql)){
                echo "Данные в связанную табл добавлены";
            } else{
                echo "Ошибка: " . $connection->error;
            }
        }
    }
?>