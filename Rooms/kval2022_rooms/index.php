<?php
/*
 * * * * * Аксенов Максим * * * * *
 * * * * * Группа 39-02з * * * * *
 * */

//Откроем сессию
session_start();

//включим отображение ошибок
ini_set("display_errors",1);
error_reporting(E_ALL);

//Подключение БД
require_once "./db/db.php";
//Запрсы к БД
require_once "./db/requests.php";
//Дополнительные функции
require_once "./functions.php";
//Роутинг
require_once "./router.php";