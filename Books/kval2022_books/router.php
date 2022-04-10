<?php

//Запросы
switch (getUri()) {
    case "":
        render("./pages/home.php");
        break;
    case "book-request":
        render("./pages/book-request.php");
        break;
    case "book-max-requests":
        render("./pages/book-max-requests.php");
        break;
    case "request-date":
        render("./pages/request-date.php");
        break;
    case "new-book":
        render("./pages/new-book.php");
        break;
    default:
        render("./pages/404.php");
}

