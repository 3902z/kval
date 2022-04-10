<?php

//Запросы
switch (getUri()) {
    case "":
        render("./pages/home.php");
        break;
    case "new-request":
        render("./pages/new-request.php");
        break;
    case "type-rooms":
        render("./pages/type-rooms.php");
        break;
    case "action-rooms":
        render("./pages/action-rooms.php");
        break;
    default:
        render("./pages/404.php");
}

