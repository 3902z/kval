<?php

//Запросы
switch (getUri()) {
    case "":
        render("./pages/home.php");
        break;
    case "max-penalty":
        render("./pages/max-penalty.php");
        break;
    case "penalty-date":
        render("./pages/penalty-date.php");
        break;
    case "new-penalty":
        render("./pages/new-penalty.php");
        break;
    default:
        render("./pages/404.php");
}

