<?php if(!empty($_SESSION['flash'])):?>
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['flash']?>
    </div>
<?php endif;?>
<h2>Новая заявка на книгу</h2>
<div class="form">
    <form method="POST" action="book-request" class="row g-3">

        <label>ФИО Клиента</label>
        <input type="text" name="client_name" class="form-control">

        <label>Дата заявки</label>
        <input type="date" name="request_date" class="form-control">

        <label>Автор книги</label>
        <input type="text" name="book_author" class="form-control">

        <label>Название книги</label>
        <input type="text" name="book_name" class="form-control">

        <label>Издательство</label>
        <input type="text" name="book_publisher" class="form-control">

        <label>Год издания</label>
        <input type="text" name="book_year" class="form-control">


        <input type="submit" value="Отправить" name="send" class="btn btn-success">
    </form>
</div>


<?php
if(isset($_POST['send']))
{
    if(isset($_POST["client_name"])
        && isset($_POST["request_date"])
        && isset($_POST["book_author"])
        && isset($_POST["book_name"])
        && isset($_POST["book_publisher"])
        && isset($_POST["book_year"])
    ){
        $id = mysqlAddRequest(
            $_POST["client_name"],
            $_POST["request_date"],
            $_POST["book_author"],
            $_POST["book_name"],
            $_POST["book_publisher"],
            $_POST["book_year"]
        );
        if ($id) {
            $_SESSION['flash'] = 'Заявка добавлена. ID=' . $id;
        } else {
            $_SESSION['flash'] = 'Книга в наличии, заявка не нужна';
        }
        header("Location: ".$_SERVER['REQUEST_URI']);
    }
}else{
    if(!empty($_SESSION['flash']))
    {
        unset($_SESSION['flash']);
    }
}
?>