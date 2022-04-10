<?php

function mysqlAddBook($author, $name, $publisher, $year, $cost, $available) {
    $sql = "INSERT INTO books (b_author, b_title, b_publisher, b_year, b_cost, b_available) 
            VALUES ('{$author}', '{$name}', '{$publisher}', '{$year}', '{$cost}', '{$available}')";
    echo $sql;
    return insert($sql);
}

function mysqlAddRequest($clientName, $date, $author, $bookName, $publisher, $year) {
    if (query("SELECT books.id FROM books WHERE b_title='{$bookName}' AND b_available=1")) {
        return false;
    } else {
        $sql = "INSERT INTO requests (customer_name, request_date) VALUES ('{$clientName}', '{$date}')";
        $requestId = insert($sql);
        $bookId = mysqlAddBook($author, $bookName, $publisher, $year, 0, 0);
        insert("INSERT INTO books_requests (book_id, request_id) VALUES ('{$bookId}','{$requestId}')");
        return $requestId;
    }
}

function getPopularBooks() {
    $sql = "SELECT books.b_title as b_name, COUNT(books_requests.request_id) as req_count FROM books_requests JOIN books WHERE books.id=books_requests.book_id GROUP BY books_requests.book_id ORDER BY req_count DESC";
    return  query($sql);
}

function mysqlGetRequestsByDate($date1, $date2) {
    $sql = "SELECT * FROM Requests WHERE request_date BETWEEN '{$date1}' AND '{$date2}'";
    return query($sql);
}