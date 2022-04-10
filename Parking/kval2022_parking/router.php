<?php

//Запросы
switch (getUri()) {
    case "":
        render("./pages/home.php");
        break;
    case "new-ticket":
        render("./pages/new-ticket.php");
        break;
    case "no-cash":
        render("./pages/no-cash.php");
        break;
    default:
        render("./pages/404.php");
}

