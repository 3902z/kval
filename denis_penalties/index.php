<?php

    $url = $_SERVER['REQUEST_URI'];

    //подключение к базе данных
    require_once './database.php';

    //сравниваем запрос из браузера
    if ($url == '/') {
        //подключение файла
        require_once './pages/home.php';
    //сравниваем запрос из браузера
    } elseif ($url == '/create') {
        //подключение файла
        require_once './pages/create.php';
    } elseif ($url == '/period') {
        //подключение файла
        require_once './pages/period.php';
    } elseif ($url == '/bolshe') {
        //подключение файла
        require_once './pages/bolshe.php';
    } else {
        echo 'Такой страницы нет.';
    }

////Откроем сессию
//session_start();
//
////Настройки
//const DEBUG = 1;
//
////включим отображение ошибок
//ini_set("display_errors",1);
//error_reporting(E_ALL);
//
////подключаем необходимые файлы
//require_once "./db/db.php";
//require_once "./db/requests.php";
//require_once "./functions.php";
//require_once "./router.php";