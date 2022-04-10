<?php

function query($query) {
    $conn = getConnectionMysql();
    $arr = [];
    if ($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        $result->close();
    }
    closeConnectionMysql($conn);
    return $arr;
}
function insert($sql) {
    $conn = getConnectionMysql();
    echo $sql;
    if($conn->query($sql)){
        echo "Данные успешно добавлены. ";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $id = mysqli_insert_id($conn);
    closeConnectionMysql($conn);
    return $id;
}
function getConnectionMysql() {
    $host = 'localhost'; // адрес сервера
    $db_name = 's'; // имя базы данных
    $db_user = 'root'; // имя пользователя
    $db_pass = ''; // пароль
    // подключаемся к базе MySQL
    $mysql = new mysqli($host, $db_user, $db_pass, $db_name);
    // проверяем подключение
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    } else {
        return $mysql;
    }
}
function closeConnectionMysql($conn) {
    $conn->close();
}
