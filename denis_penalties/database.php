<?php

    $host = 'localhost'; // адрес сервера
    $db_name = 'cars1'; // имя базы данных
    $db_user = 'root'; // имя пользователя
    $db_pass = ''; // пароль

    //соединение с базой данных
    $connection = new mysqli($host, $db_user, $db_pass, $db_name);

    //проверка подключения
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    } else {
        //проверка работы (можно убрать)
        echo 'База работает';
    }

