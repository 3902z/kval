<?php

//Функция получения URI
function getUri()
{
    $uri = explode('?', $_SERVER['REQUEST_URI'], 2);
    return trim($uri[0], "/");
}

//собираем страницу
function render($page)
{
    require_once "./partials/head.php";
    require_once $page;
    require_once "./partials/footer.php";
}
