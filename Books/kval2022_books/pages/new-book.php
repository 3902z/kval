<?php if(!empty($_SESSION['flash'])):?>
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['flash']?>
    </div>
<?php endif;?>
<?php
if(isset($_POST['send']))
{
    if(isset($_POST["book_author"])
        && isset($_POST["book_name"])
        && isset($_POST["book_publisher"])
        && isset($_POST["book_year"])
        && isset($_POST["book_cost"])
        && isset($_POST["book_available"])
    ){
        $id = mysqlAddBook(
            $_POST["book_author"],
            $_POST["book_name"],
            $_POST["book_publisher"],
            $_POST["book_year"],
            $_POST["book_cost"],
            $_POST["book_available"]
        );
        $_SESSION['flash'] = 'Книга добавлена. ID=' . $id;
        header("Location: ".$_SERVER['REQUEST_URI']);
    }
}else{
    if(!empty($_SESSION['flash']))
    {
        unset($_SESSION['flash']);
    }
}
?>
<h2>Новая книга</h2>
<div class="form">
    <form method="POST" action="new-book" class="row g-3">

        <label>Автор книги</label>
        <input type="text" name="book_author" class="form-control">

        <label>Название книги</label>
        <input type="text" name="book_name" class="form-control">

        <label>Издательство</label>
        <input type="text" name="book_publisher" class="form-control">

        <label>Год издания</label>
        <input type="text" name="book_year" class="form-control">

        <label>Стоимость книги</label>
        <input type="text" name="book_cost" class="form-control">

        <label>Наличие книги</label>
        <input type="text" name="book_available" class="form-control">

        <input type="submit" value="Отправить" name="send" class="btn btn-success">
    </form>
</div>





