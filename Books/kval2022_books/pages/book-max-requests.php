<h2>Книги с наибольшим числом заявок</h2>
<?php
    $books = getPopularBooks();
    foreach ($books as $book) {
        echo $book['b_name'] . " : заявок : " . $book['req_count'] . "<br />";
    }
?>
